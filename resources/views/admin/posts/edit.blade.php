@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-semibold mb-6">Edit Post</h1>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title', $post->title) }}" required>
            @error('title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content', $post->content) }}</textarea>
            <div class="mt-2">
                <button type="button" id="open-editor-media-picker" class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300">Insert Image from Media</button>
            </div>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Categories <span class="text-red-500">*</span></label>
            <select name="categories[]" multiple required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" size="4">
                <option value="" disabled>Select at least one category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">Hold Ctrl (or Cmd on Mac) to select multiple categories</p>
            @error('categories')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Featured Image</label>
            <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id') }}">
            <div id="selected-media-preview" class="mt-2 {{ $post->image_url ? '' : 'hidden' }}">
                <img id="selected-media-img" src="{{ $post->image_url ? asset($post->image_url) : '' }}" alt="Selected media" class="h-20 w-20 object-cover rounded">
            </div>
            <div class="mt-2 flex items-center gap-3">
                <button type="button" id="open-media-picker" class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300">Choose from Media</button>
                <a href="{{ route('admin.media.index') }}" target="_blank" class="text-sm text-blue-600">Manage Media Library</a>
            </div>
            @error('media_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('featured', $post->featured) ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Featured Post (Show on Home Page)</span>
            </label>
            @error('featured')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.posts.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        ClassicEditor.create(document.querySelector('textarea[name="content"]'), {
            toolbar: {
                items: [
                    'heading','|','bold','italic','link','bulletedList','numberedList','blockQuote','insertTable','undo','redo'
                ]
            }
        })
            .then(editor => {
                window.postEditor = editor;
                editor.ui.view.editable.element.style.minHeight = '400px';
            })
            .catch(error => console.error(error));
    });
</script>
<script>
    (function(){
        const btn = document.getElementById('open-media-picker');
        if(!btn) return;
        const modal = document.createElement('div');
        modal.id = 'media-modal';
        modal.className = 'fixed inset-0 bg-black/50 z-50 hidden';
        modal.innerHTML = `
            <div class=\"min-h-screen flex items-end sm:items-center justify-center p-0 sm:p-4\">\n            <div class=\"bg-white rounded-t sm:rounded shadow-lg w-full sm:max-w-5xl\">\n              <div class=\"p-3 sm:p-4 border-b flex items-center gap-2\">\n                <h3 class=\"font-semibold flex-1\">Select Media</h3>\n                <input id=\"media-search-input\" type=\"text\" placeholder=\"Search by name...\" class=\"w-40 sm:w-60 rounded-md border-gray-300 shadow-sm px-2 py-1\" />\n                <button id=\"media-modal-close\" class=\"text-gray-600 px-2 py-1\">Close</button>\n              </div>\n              <div id=\"media-modal-grid\" class=\"p-3 sm:p-4 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 sm:gap-3 max-h-[70vh] overflow-auto\">\n                ${@json($mediaItems).map(m => \`\n                  <button type=\"button\" class=\"border rounded overflow-hidden group\" data-id=\"${m.id}\" data-src=\"${` + "{{ asset('') }}" + `+m.path}\" data-name=\"${(m.filename||'').toLowerCase()}\">\n                    <img src=\"${` + "{{ asset('') }}" + `+m.path}\" class=\"w-full aspect-square object-cover group-hover:opacity-80\" />\n                    <div class=\"p-1 text-[10px] sm:text-xs truncate\">${m.filename}</div>\n                  </button>\n                \`).join('')}\n              </div>\n              <div class=\"p-3 border-t text-right\">\n                <button id=\"media-modal-cancel\" class=\"px-3 py-2 bg-gray-200 rounded\">Close</button>\n              </div>\n            </div>\n          </div>`;
        document.body.appendChild(modal);

        const open = () => modal.classList.remove('hidden');
        const close = () => modal.classList.add('hidden');
        btn.addEventListener('click', open);
        modal.addEventListener('click', (e) => {
            if (e.target.id === 'media-modal' || e.target.id === 'media-modal-close' || e.target.id === 'media-modal-cancel') {
                close();
            }
        });

        modal.addEventListener('click', (e) => {
            const pick = e.target.closest('button[data-id]');
            if(!pick) return;
            const id = pick.getAttribute('data-id');
            const src = pick.getAttribute('data-src');
            document.getElementById('media_id').value = id;
            const wrap = document.getElementById('selected-media-preview');
            const img = document.getElementById('selected-media-img');
            img.src = src;
            wrap.classList.remove('hidden');
            close();
        });
        // Inject Load more button
        (function(){
            const footer = modal.querySelector('.border-t');
            const cancel = modal.querySelector('#media-modal-cancel');
            if (footer && cancel) {
                const wrap = document.createElement('div');
                wrap.className = 'flex items-center justify-between';
                const load = document.createElement('button');
                load.id = 'media-modal-load';
                load.className = 'px-3 py-2 bg-gray-100 rounded';
                load.textContent = 'Load more';
                footer.innerHTML = '';
                footer.appendChild(wrap);
                wrap.appendChild(load);
                wrap.appendChild(cancel);
            }
        })();

        // AJAX load + live search
        const API = "{{ route('admin.media.list') }}";
        const grid = modal.querySelector('#media-modal-grid');
        const si = modal.querySelector('#media-search-input');
        const loadBtn = modal.querySelector('#media-modal-load');
        let state = { q: '', page: 1, last: 1, loading: false };

        const render = (items, append = false) => {
            if (!append) grid.innerHTML = '';
            items.forEach(m => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'border rounded overflow-hidden group';
                btn.setAttribute('data-id', m.id);
                btn.setAttribute('data-src', m.url);
                btn.setAttribute('data-name', (m.filename || '').toLowerCase());
                btn.innerHTML = `<img src="${m.url}" class="w-full aspect-square object-cover group-hover:opacity-80" />\n<div class=\"p-1 text-[10px] sm:text-xs truncate\">${m.filename}</div>`;
                grid.appendChild(btn);
            });
            if (loadBtn) loadBtn.disabled = state.page >= state.last;
        };

        const fetchMedia = async (append = false) => {
            if (state.loading) return; state.loading = true;
            const url = `${API}?q=${encodeURIComponent(state.q)}&page=${state.page}`;
            const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
            const json = await res.json();
            state.last = json.meta.last_page;
            render(json.data, append);
            state.loading = false;
        };

        // Initial load on open
        btn.addEventListener('click', () => {
            state = { q: '', page: 1, last: 1, loading: false };
            if (si) si.value = '';
            fetchMedia(false);
        });

        // Live search with debounce
        let t; si && si.addEventListener('input', () => {
            clearTimeout(t);
            t = setTimeout(() => {
                state.q = si.value.trim();
                state.page = 1;
                fetchMedia(false);
            }, 250);
        });

        // Load more
        loadBtn && loadBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (state.page < state.last) {
                state.page += 1;
                fetchMedia(true);
            }
        });
    })();
</script>
<script>
    // Editor media picker (AJAX + insert at cursor)
    (function(){
        const trigger = document.getElementById('open-editor-media-picker');
        if(!trigger) return;
        const modal = document.createElement('div');
        modal.id = 'editor-media-modal';
        modal.className = 'fixed inset-0 bg-black/50 z-50 hidden';
        modal.innerHTML = `
          <div class=\"min-h-screen flex items-end sm:items-center justify-center p-0 sm:p-4\">\n            <div class=\"bg-white rounded-t sm:rounded shadow-lg w-full sm:max-w-5xl\">\n              <div class=\"p-3 sm:p-4 border-b flex items-center gap-2\">\n                <h3 class=\"font-semibold flex-1\">Insert Image</h3>\n                <input id=\"editor-media-search-input\" type=\"text\" placeholder=\"Search by name...\" class=\"w-40 sm:w-60 rounded-md border-gray-300 shadow-sm px-2 py-1\" />\n                <button id=\"editor-media-modal-close\" class=\"text-gray-600 px-2 py-1\">Close</button>\n              </div>\n              <div id=\"editor-media-modal-grid\" class=\"p-3 sm:p-4 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 sm:gap-3 max-h-[70vh] overflow-auto\"></div>\n              <div class=\"p-3 border-t text-right\">\n                <div class=\"flex items-center justify-between\">\n                  <button id=\"editor-media-modal-load\" class=\"px-3 py-2 bg-gray-100 rounded\">Load more</button>\n                  <button id=\"editor-media-modal-cancel\" class=\"px-3 py-2 bg-gray-200 rounded\">Close</button>\n                </div>\n              </div>\n            </div>\n          </div>`;
        document.body.appendChild(modal);

        const open = () => modal.classList.remove('hidden');
        const close = () => modal.classList.add('hidden');
        trigger.addEventListener('click', () => {
            state = { q: '', page: 1, last: 1, loading: false };
            si.value = '';
            fetchMedia(false);
            open();
        });
        modal.addEventListener('click', (e) => {
            if (e.target.id === 'editor-media-modal' || e.target.id === 'editor-media-modal-close' || e.target.id === 'editor-media-modal-cancel') {
                close();
            }
        });

        const API = "{{ route('admin.media.list') }}";
        const grid = modal.querySelector('#editor-media-modal-grid');
        const si = modal.querySelector('#editor-media-search-input');
        const loadBtn = modal.querySelector('#editor-media-modal-load');
        let state = { q: '', page: 1, last: 1, loading: false };

        const render = (items, append = false) => {
            if (!append) grid.innerHTML = '';
            items.forEach(m => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'border rounded overflow-hidden group';
                btn.innerHTML = `<img src=\\"${m.url}\\" class=\\"w-full aspect-square object-cover group-hover:opacity-80\\" /><div class=\\"p-1 text-[10px] sm:text-xs truncate\\">${m.filename}</div>`;
                btn.addEventListener('click', () => {
                    try {
                        const editor = window.postEditor;
                        if (editor) {
                            const viewFrag = editor.data.processor.toView(`<img src=\\"${m.url}\\" alt=\\"${m.alt || m.title || m.filename}\\">`);
                            const modelFrag = editor.data.toModel(viewFrag);
                            editor.model.insertContent(modelFrag, editor.model.document.selection);
                        }
                    } catch(e) { console.error(e); }
                    close();
                });
                grid.appendChild(btn);
            });
            loadBtn.disabled = state.page >= state.last;
        };

        const fetchMedia = async (append = false) => {
            if (state.loading) return; state.loading = true;
            const url = `${API}?q=${encodeURIComponent(state.q)}&page=${state.page}`;
            const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
            const json = await res.json();
            state.last = json.meta.last_page;
            render(json.data, append);
            state.loading = false;
        };

        // Live search with debounce
        let t; si && si.addEventListener('input', () => {
            clearTimeout(t);
            t = setTimeout(() => {
                state.q = si.value.trim();
                state.page = 1;
                fetchMedia(false);
            }, 250);
        });

        // Load more
        loadBtn && loadBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (state.page < state.last) {
                state.page += 1;
                fetchMedia(true);
            }
        });
    })();
</script>
@endpush
