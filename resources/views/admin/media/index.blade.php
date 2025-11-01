@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto px-3">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Media Library</h1>
        <a href="{{ route('admin.posts.create') }}" class="text-sm text-blue-600 hover:underline">Back to New Post</a>
    </div>

    <div class="bg-white p-4 rounded border mb-6">
        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            @csrf
            <div>
                <label class="block text-gray-700">Upload Image</label>
                <input type="file" name="file" accept="image/*" required class="mt-1 block w-full" />
                @error('file')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" required placeholder="e.g. breaking-news" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700">Alt (optional)</label>
                <input type="text" name="alt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
            </div>
            <div class="flex md:justify-end">
                <button type="submit" class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Upload</button>
            </div>
        </form>
    </div>

    <div class="mb-4">
        <input id="media-search" type="text" placeholder="Search by name..." class="w-full md:w-80 rounded-md border-gray-300 shadow-sm px-3 py-2" />
    </div>

    <div id="media-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($media as $item)
            <div class="border rounded overflow-hidden bg-white" data-name="{{ strtolower($item->filename) }}">
                <img src="{{ asset($item->path) }}" alt="{{ $item->alt ?? $item->title ?? $item->filename }}" class="w-full aspect-[4/3] object-cover" />
                <div class="p-2 text-xs sm:text-sm flex items-center justify-between gap-2">
                    <span class="truncate" title="{{ $item->filename }}">{{ $item->filename }}</span>
                    <form action="{{ route('admin.media.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this media?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-full text-gray-600">No media uploaded yet.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $media->links() }}
    </div>
    <script>
        (function(){
            const input = document.getElementById('media-search');
            const grid = document.getElementById('media-grid');
            if(!input || !grid) return;
            const API = "{{ route('admin.media.list') }}";
            let t;
            const render = (items) => {
                grid.innerHTML = '';
                items.forEach(m => {
                    const card = document.createElement('div');
                    card.className = 'border rounded overflow-hidden bg-white';
                    card.setAttribute('data-name', (m.filename || '').toLowerCase());
                    card.innerHTML = `
                        <img src="${m.url}" alt="${m.title || m.alt || m.filename}" class="w-full aspect-[4/3] object-cover" />
                        <div class="p-2 text-xs sm:text-sm flex items-center justify-between gap-2">
                            <span class="truncate" title="${m.filename}">${m.filename}</span>
                        </div>`;
                    grid.appendChild(card);
                });
            };
            const fetchMedia = async (q) => {
                const res = await fetch(`${API}?q=${encodeURIComponent(q)}&per_page=48`, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const json = await res.json();
                render(json.data);
            };
            input.addEventListener('input', () => {
                clearTimeout(t);
                t = setTimeout(() => fetchMedia(input.value.trim()), 250);
            });
        })();
    </script>
</div>
@endsection
