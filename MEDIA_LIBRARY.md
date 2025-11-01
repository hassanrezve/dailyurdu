Media Library Module

Overview
- Centralized image storage under `public/uploads/media` (physically `/home/dailyurd/public_html/uploads/media`).
- Admin can upload/delete media at `Admin → Media` (`/admin/media`).
- Post create/edit uses a picker to select an image from the library. No direct uploads in post forms.

Usage
- Upload: Go to `Admin → Media`, choose an image, optionally set title/alt, and upload.
- Select in Post: In the post form, click "Choose from Media", pick an image. A preview shows the selection.
- Manage: Delete unused images from the Media page. Deleting a post does not remove media.

Implementation Notes
- Database: `media` table stores `filename, path (relative), mime_type, size, title, alt, created_by, width, height`.
- Posts continue to use `posts.image_url` but now store the selected media's relative path for full backward compatibility.
- Uploads are converted to WebP when possible.

Setup
- Run migrations: `php artisan migrate`.
- Ensure the PHP GD extension is enabled for image conversion.
- If the server public path differs, update `$publicHtmlPath` in `app/Http/Controllers/Admin/MediaController.php` and `app/Http/Controllers/Admin/PostController.php`.

