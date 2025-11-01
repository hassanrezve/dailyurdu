@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-3">
    <h1 class="text-2xl font-semibold mb-6">Create Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content') }}</textarea>
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
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->name }}</option>
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
            <div id="selected-media-preview" class="mt-2 hidden">
                <img id="selected-media-img" src="" alt="Selected media" class="h-20 w-20 object-cover rounded">
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
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('featured') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Featured Post (Show on Home Page)</span>
            </label>
            @error('featured')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.posts.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
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
    // Basic modal without external deps
    (function(){
        const btn = document.getElementById('open-media-picker');
        if(!btn) return;
        const modal = document.createElement('div');
        modal.id = 'media-modal';
        modal.className = 'fixed inset-0 bg-black/50 z-50 hidden';
        modal.innerHTML = `
          <div class="min-h-screen flex items-center justify-center p-2 sm:p-4">
            <div class="bg-white rounded shadow-lg w-full max-w-lg sm:max-w-5xl">
              <div class="p-3 sm:p-4 border-b flex items-center gap-2 sticky top-0 bg-white z-10">
                <h3 class="font-semibold flex-1">Select Media</h3>
                <input id="media-search-input" type="text" placeholder="Search by name..." class="w-40 sm:w-60 rounded-md border-gray-300 shadow-sm px-2 py-1" />
                <button id="media-modal-close" class="text-gray-600">✕</button>
              </div>
              <div id="media-modal-grid" class="p-3 sm:p-4 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 sm:gap-3 max-h-[70vh] overflow-auto">
                ${@json($mediaItems).map(m => `
                  <button type="button" class="border rounded overflow-hidden group" data-id="${m.id}" data-src="${`{{ asset('') }}`+m.path}" data-name="${(m.filename||'').toLowerCase()}">
                    <img src="${`{{ asset('') }}`+m.path}" class="w-full aspect-square object-cover group-hover:opacity-80" />
                    <div class="p-1 text-xs truncate">${m.filename}</div>
                  </button>
                `).join('')}
              </div>
              <div class="p-3 border-t">
                <div class="flex items-center justify-between gap-2">
                  <button id="media-modal-load" class="flex-1 px-3 py-2 bg-gray-100 rounded">Load more</button>
                  <button id="media-modal-cancel" class="px-3 py-2 bg-gray-200 rounded">Close</button>
                </div>
              </div>
            </div>
          </div>`;
        document.body.appendChild(modal);
        // Tweak editor modal classes for mobile
        try {
            const frame = modal.querySelector('.min-h-screen');
            if (frame) frame.className = 'min-h-screen flex items-center justify-center p-2 sm:p-4';
            const panel = modal.querySelector('.bg-white');
            if (panel) panel.classList.add('rounded','max-w-lg');
            const header = modal.querySelector('.border-b');
            if (header) header.classList.add('sticky','top-0','bg-white','z-10','p-3');
            const footer = modal.querySelector('.border-t');
            if (footer) footer.classList.add('p-3');
        } catch (e) { /* noop */ }
        // Tweak classes for better mobile compaction and centering
        try {
            const frame = modal.querySelector('.min-h-screen');
            if (frame) frame.className = 'min-h-screen flex items-center justify-center p-2 sm:p-4';
            const panel = modal.querySelector('.bg-white');
            if (panel) {
                panel.classList.remove('rounded-t');
                panel.classList.add('rounded', 'max-w-lg');
            }
            const header = modal.querySelector('.border-b');
            if (header) header.classList.add('sticky','top-0','bg-white','z-10','p-3');
            const footer = modal.querySelector('.border-t');
            if (footer) footer.classList.add('p-3');
        } catch (e) { /* noop */ }

        // Upload inside modal (featured image)
        (function(){
            const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const uploadWrap = document.createElement('div');
            uploadWrap.className = 'p-2 sm:p-3 border-b bg-white';
            uploadWrap.innerHTML = `
              <form id="media-upload-form" class="grid grid-cols-1 sm:grid-cols-5 gap-2 items-end">
                <div>
                  <label class="block text-gray-700 text-sm">File</label>
                  <input id="media-upload-file" type="file" accept="image/*" class="block w-full" required />
                </div>
                <div>
                  <label class="block text-gray-700 text-sm">Name</label>
                  <input id="media-upload-name" type="text" placeholder="e.g. breaking-news" class="block w-full rounded-md border-gray-300 shadow-sm" required />
                </div>
                <div class="sm:col-span-2">
                  <label class="block text-gray-700 text-sm">Alt (optional)</label>
                  <input id="media-upload-alt" type="text" class="block w-full rounded-md border-gray-300 shadow-sm" />
                </div>
                <div>
                  <button id="media-upload-button" type="submit" class="w-full px-3 py-2 bg-blue-600 text-white rounded">Upload</button>
                </div>
              </form>`;
            const grid = modal.querySelector('#media-modal-grid');
            grid.parentNode.insertBefore(uploadWrap, grid);

            const API_UPLOAD = "{{ route('admin.media.store') }}";
            const API_LIST = "{{ route('admin.media.list') }}";
            const form = uploadWrap.querySelector('#media-upload-form');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const file = uploadWrap.querySelector('#media-upload-file').files[0];
                const name = uploadWrap.querySelector('#media-upload-name').value.trim();
                const alt = uploadWrap.querySelector('#media-upload-alt').value.trim();
                if (!file || !name) return;
                const fd = new FormData();
                fd.append('file', file);
                fd.append('name', name);
                fd.append('alt', alt);
                fd.append('_token', csrf);
                try {
                    const res = await fetch(API_UPLOAD, { method: 'POST', headers: { 'X-Requested-With':'XMLHttpRequest' }, body: fd });
                    if (!res.ok) throw new Error('Upload failed');
                    const json = await res.json();
                    const item = json.data;
                    // Auto-select uploaded image
                    document.getElementById('media_id').value = item.id;
                    const wrap = document.getElementById('selected-media-preview');
                    const img = document.getElementById('selected-media-img');
                    img.src = item.url;
                    wrap.classList.remove('hidden');
                    // Refresh grid first page
                    const res2 = await fetch(`${API_LIST}?page=1`, { headers: { 'X-Requested-With':'XMLHttpRequest' } });
                    const json2 = await res2.json();
                    grid.innerHTML = '';
                    json2.data.forEach(m => {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'border rounded overflow-hidden group';
                        btn.setAttribute('data-id', m.id);
                        btn.setAttribute('data-src', m.url);
                        btn.setAttribute('data-name', (m.filename || '').toLowerCase());
                        btn.innerHTML = `<img src="${m.url}" class="w-full aspect-square object-cover group-hover:opacity-80" /><div class=\"p-1 text-[10px] sm:text-xs truncate\">${m.filename}</div>`;
                        grid.appendChild(btn);
                    });
                } catch(err) {
                    alert('Upload failed. Please check file and name.');
                }
            });
        })();

        const open = () => modal.classList.remove('hidden');
        const close = () => modal.classList.add('hidden');
        btn.addEventListener('click', open);
        modal.addEventListener('click', (e) => {
            if (e.target.id === 'media-modal' || e.target.id === 'media-modal-close' || e.target.id === 'media-modal-cancel') {
                close();
            }
        });

        modal.addEventListener('click', (e) => {
            const btn = e.target.closest('button[data-id]');
            if(!btn) return;
            const id = btn.getAttribute('data-id');
            const src = btn.getAttribute('data-src');
            document.getElementById('media_id').value = id;
            const wrap = document.getElementById('selected-media-preview');
            const img = document.getElementById('selected-media-img');
            img.src = src;
            wrap.classList.remove('hidden');
            close();
        });
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

        // Initial load on open
        btn.addEventListener('click', () => {
            state = { q: '', page: 1, last: 1, loading: false };
            si.value = '';
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
    // Upload inside editor modal
    (function(){
        const trigger = document.getElementById('open-editor-media-picker');
        if (!trigger) return;
        const modal = document.getElementById('editor-media-modal');
        const grid = modal.querySelector('#editor-media-modal-grid');
        const si = modal.querySelector('#editor-media-search-input');
        const loadBtn = modal.querySelector('#editor-media-modal-load');
        const API_UPLOAD = "{{ route('admin.media.store') }}";
        const API_LIST = "{{ route('admin.media.list') }}";
        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const uploadWrap = document.createElement('div');
            uploadWrap.className = 'p-2 sm:p-3 border-b bg-white';
        uploadWrap.innerHTML = `
          <form id="editor-media-upload-form" class="grid grid-cols-1 sm:grid-cols-5 gap-2 items-end">
            <div>
              <label class="block text-gray-700 text-sm">File</label>
              <input id="editor-media-upload-file" type="file" accept="image/*" class="block w-full" required />
            </div>
            <div>
              <label class="block text-gray-700 text-sm">Name</label>
              <input id="editor-media-upload-name" type="text" placeholder="e.g. in-article-photo" class="block w-full rounded-md border-gray-300 shadow-sm" required />
            </div>
            <div class="sm:col-span-2">
              <label class="block text-gray-700 text-sm">Alt (optional)</label>
              <input id="editor-media-upload-alt" type="text" class="block w-full rounded-md border-gray-300 shadow-sm" />
            </div>
            <div>
              <button id="editor-media-upload-button" type="submit" class="w-full px-3 py-2 bg-blue-600 text-white rounded">Upload</button>
            </div>
          </form>`;
        grid.parentNode.insertBefore(uploadWrap, grid);

        uploadWrap.querySelector('#editor-media-upload-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const file = uploadWrap.querySelector('#editor-media-upload-file').files[0];
            const name = uploadWrap.querySelector('#editor-media-upload-name').value.trim();
            const alt = uploadWrap.querySelector('#editor-media-upload-alt').value.trim();
            if (!file || !name) return;
            const fd = new FormData();
            fd.append('file', file);
            fd.append('name', name);
            fd.append('alt', alt);
            fd.append('_token', csrf);
            try {
                const res = await fetch(API_UPLOAD, { method: 'POST', headers: { 'X-Requested-With':'XMLHttpRequest' }, body: fd });
                if (!res.ok) throw new Error('Upload failed');
                const json = await res.json();
                const item = json.data;
                // Insert directly into editor
                try {
                    const editor = window.postEditor;
                    if (editor) {
                        const viewFrag = editor.data.processor.toView(`<img src="${item.url}" alt="${item.alt || item.title || item.filename}">`);
                        const modelFrag = editor.data.toModel(viewFrag);
                        editor.model.insertContent(modelFrag, editor.model.document.selection);
                    }
                } catch(e) {}
                // Refresh grid list
                const res2 = await fetch(`${API_LIST}?page=1`, { headers: { 'X-Requested-With':'XMLHttpRequest' } });
                const json2 = await res2.json();
                grid.innerHTML = '';
                json2.data.forEach(m => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'border rounded overflow-hidden group';
                    btn.innerHTML = `<img src="${m.url}" class="w-full h-28 object-cover group-hover:opacity-80" /><div class=\"p-1 text-[10px] sm:text-xs truncate\">${m.filename}</div>`;
                    btn.addEventListener('click', () => {
                        try {
                            const editor = window.postEditor;
                            if (editor) {
                                const viewFrag = editor.data.processor.toView(`<img src=\\"${m.url}\\" alt=\\"${m.alt || m.title || m.filename}\\">`);
                                const modelFrag = editor.data.toModel(viewFrag);
                                editor.model.insertContent(modelFrag, editor.model.document.selection);
                            }
                        } catch(e) {}
                        modal.classList.add('hidden');
                    });
                    grid.appendChild(btn);
                });
            } catch(err) {
                alert('Upload failed. Please check file and name.');
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
          <div class="min-h-screen flex items-center justify-center p-2 sm:p-4">
            <div class="bg-white rounded shadow-lg w-full max-w-lg sm:max-w-5xl">
              <div class="p-3 sm:p-4 border-b flex items-center gap-2 sticky top-0 bg-white z-10">
                <h3 class="font-semibold flex-1">Insert Image</h3>
                <input id="editor-media-search-input" type="text" placeholder="Search by name..." class="w-40 sm:w-60 rounded-md border-gray-300 shadow-sm px-2 py-1" />
                <button id="editor-media-modal-close" class="text-gray-600 px-2 py-1">Close</button>
              </div>
              <div id="editor-media-upload" class="p-2 sm:p-3 border-b bg-white">
                <form id="editor-media-upload-form" class="grid grid-cols-1 sm:grid-cols-5 gap-2 items-end">
                  <div>
                    <label class="block text-gray-700 text-sm">File</label>
                    <input id="editor-media-upload-file" type="file" accept="image/*" class="block w-full" required />
                  </div>
                  <div>
                    <label class="block text-gray-700 text-sm">Name</label>
                    <input id="editor-media-upload-name" type="text" placeholder="e.g. in-article-photo" class="block w-full rounded-md border-gray-300 shadow-sm" required />
                  </div>
                  <div class="sm:col-span-2">
                    <label class="block text-gray-700 text-sm">Alt (optional)</label>
                    <input id="editor-media-upload-alt" type="text" class="block w-full rounded-md border-gray-300 shadow-sm" />
                  </div>
                  <div>
                    <button id="editor-media-upload-button" type="submit" class="w-full px-3 py-2 bg-blue-600 text-white rounded">Upload</button>
                  </div>
                </form>
              </div>
              <div id="editor-media-modal-grid" class="p-3 sm:p-4 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 sm:gap-3 max-h-[70vh] overflow-auto"></div>
              <div class="p-3 border-t">
                <div class="flex items-center justify-between gap-2">
                  <button id="editor-media-modal-load" class="flex-1 px-3 py-2 bg-gray-100 rounded">Load more</button>
                  <button id="editor-media-modal-cancel" class="px-3 py-2 bg-gray-200 rounded">Close</button>
                </div>
              </div>
            </div>
          </div>`;
        document.body.appendChild(modal);
        // Wire upload form inside editor modal
        (function(){
            const API_UPLOAD = "{{ route('admin.media.store') }}";
            const API_LIST = "{{ route('admin.media.list') }}";
            const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const grid = modal.querySelector('#editor-media-modal-grid');
            const form = modal.querySelector('#editor-media-upload-form');
            if(!form) return;
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const file = modal.querySelector('#editor-media-upload-file').files[0];
                const name = modal.querySelector('#editor-media-upload-name').value.trim();
                const alt = modal.querySelector('#editor-media-upload-alt').value.trim();
                if (!file || !name) return;
                const fd = new FormData();
                fd.append('file', file);
                fd.append('name', name);
                fd.append('alt', alt);
                fd.append('_token', csrf);
                try {
                    const res = await fetch(API_UPLOAD, { method: 'POST', headers: { 'X-Requested-With':'XMLHttpRequest' }, body: fd });
                    if (!res.ok) throw new Error('Upload failed');
                    const json = await res.json();
                    const item = json.data;
                    // Insert directly into editor
                    try {
                        const editor = window.postEditor;
                        if (editor) {
                            const viewFrag = editor.data.processor.toView(`<img src="${item.url}" alt="${item.alt || item.title || item.filename}">`);
                            const modelFrag = editor.data.toModel(viewFrag);
                            editor.model.insertContent(modelFrag, editor.model.document.selection);
                        }
                    } catch(e) {}
                    // Refresh grid list
                    const res2 = await fetch(`${API_LIST}?page=1`, { headers: { 'X-Requested-With':'XMLHttpRequest' } });
                    const json2 = await res2.json();
                    grid.innerHTML = '';
                    json2.data.forEach(m => {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'border rounded overflow-hidden group';
                        btn.innerHTML = `<img src="${m.url}" class="w-full aspect-square object-cover group-hover:opacity-80" /><div class=\\"p-1 text-[10px] sm:text-xs truncate\\">${m.filename}</div>`;
                        btn.addEventListener('click', () => {
                            try {
                                const editor = window.postEditor;
                                if (editor) {
                                    const viewFrag = editor.data.processor.toView(`<img src=\\\"${m.url}\\\" alt=\\\"${m.alt || m.title || m.filename}\\\">`);
                                    const modelFrag = editor.data.toModel(viewFrag);
                                    editor.model.insertContent(modelFrag, editor.model.document.selection);
                                }
                            } catch(e) {}
                            modal.classList.add('hidden');
                        });
                        grid.appendChild(btn);
                    });
                } catch(err) {
                    alert('Upload failed. Please check file and name.');
                }
            });
        })();

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
                btn.innerHTML = `<img src="${m.url}" class="w-full aspect-square object-cover group-hover:opacity-80" /><div class=\"p-1 text-[10px] sm:text-xs truncate\">${m.filename}</div>`;
                btn.addEventListener('click', () => {
                    try {
                        const editor = window.postEditor;
                        if (editor) {
                            const viewFrag = editor.data.processor.toView(`<img src="${m.url}" alt="${m.alt || m.title || m.filename}">`);
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
