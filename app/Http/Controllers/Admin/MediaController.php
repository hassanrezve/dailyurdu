<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    private string $publicHtmlPath = '';
    public function __construct()
    {
        $this->publicHtmlPath=public_path();
    }
    public function index()
    {
        $media = Media::orderBy('created_at', 'desc')->paginate(24);
        return view('admin.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,jpg,png,gif,webp|max:4096',
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
        ]);

        $destinationPath = $this->publicHtmlPath . '/uploads/media';
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file = $request->file('file');
        $name = trim($request->input('name'));
        $slug = Str::slug($name);

        // Create a temporary record to allocate an ID for unique filename
        $tempPath = 'uploads/media/__pending__' . uniqid() . '.tmp';
        $media = Media::create([
            'filename' => basename($tempPath),
            'path' => $tempPath,
            'mime_type' => null,
            'size' => 0,
            'title' => $name,
            'alt' => $request->input('alt'),
            'created_by' => optional($request->user())->id,
        ]);

        // Build final filename: {name-slug}-{id}.webp
        $finalBase = $slug !== '' ? $slug : 'media';
        $nameWithoutExt = $finalBase . '-' . $media->id;
        $webpRelativePath = $this->convertToWebP($file, $destinationPath, $nameWithoutExt);
        if (!$webpRelativePath) {
            // cleanup temp record
            $media->delete();
            return redirect()->route('admin.media.index')
                ->with('error', 'Unsupported image format. Please upload JPEG, PNG, GIF or WEBP.');
        }

        $size = @filesize($this->publicHtmlPath . '/' . $webpRelativePath) ?: 0;

        $media->filename = basename($webpRelativePath);
        $media->path = $webpRelativePath;
        $media->mime_type = 'image/webp';
        $media->size = $size;
        $media->save();

        if ($request->ajax() || $request->expectsJson()) {
            return response()->json([
                'data' => [
                    'id' => $media->id,
                    'filename' => $media->filename,
                    'title' => $media->title,
                    'alt' => $media->alt,
                    'url' => asset($media->path),
                    'path' => $media->path,
                ]
            ], 201);
        }

        return redirect()->route('admin.media.index')
            ->with('success', 'Media uploaded successfully.');
    }

    public function destroy(Media $media)
    {
        try {
            $relative = ltrim($media->path, '/');
            $fullPath = rtrim($this->publicHtmlPath, '/') . '/' . $relative;

            $deletedFile = false;
            if (is_file($fullPath)) {
                @chmod($fullPath, 0644);
                $deletedFile = @unlink($fullPath);
            }

            $media->delete();

            return redirect()->route('admin.media.index')
                ->with('success', $deletedFile ? 'Media deleted successfully.' : 'Media entry deleted. File not found or not removable (permissions).');
        } catch (\Throwable $e) {
            Log::error('Media delete failed', [
                'media_id' => $media->id,
                'path' => $media->path,
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('admin.media.index')
                ->with('error', 'Could not delete media. Please check server file permissions and path.');
        }
    }

    public function list(Request $request)
    {
        $perPage = (int) $request->query('per_page', 24);
        $perPage = max(6, min(100, $perPage));
        $q = trim((string) $request->query('q', ''));

        $query = Media::query();
        if ($q !== '') {
            $query->where(function ($sub) use ($q) {
                $sub->where('filename', 'like', "%$q%")
                    ->orWhere('title', 'like', "%$q%")
                    ->orWhere('alt', 'like', "%$q%");
            });
        }

        $paginator = $query->orderBy('created_at', 'desc')->paginate($perPage);

        $data = $paginator->getCollection()->map(function ($m) {
            return [
                'id' => $m->id,
                'filename' => $m->filename,
                'title' => $m->title,
                'alt' => $m->alt,
                'url' => asset($m->path),
                'path' => $m->path,
            ];
        })->values();

        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ],
        ]);
    }

    private function convertToWebP($image, $destinationPath, $nameWithoutExt): ?string
    {
        $extension = strtolower($image->getClientOriginalExtension());
        $webpPath = $destinationPath . '/' . $nameWithoutExt . '.webp';

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $img = imagecreatefromjpeg($image->getRealPath());
                break;
            case 'png':
                $img = imagecreatefrompng($image->getRealPath());
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
                break;
            case 'gif':
                $img = imagecreatefromgif($image->getRealPath());
                break;
            case 'webp':
                // Already webp: move under normalized name
                $image->move($destinationPath, $nameWithoutExt . '.webp');
                return 'uploads/media/' . $nameWithoutExt . '.webp';
            default:
                return null;
        }

        imagewebp($img, $webpPath, 80);
        imagedestroy($img);

        return 'uploads/media/' . $nameWithoutExt . '.webp';
    }
}
