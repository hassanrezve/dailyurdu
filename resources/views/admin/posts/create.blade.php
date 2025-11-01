@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto px-3">
    <h1 class="text-2xl font-semibold mb-6">Create Post</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        {{-- Title --}}
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            @error('title')<span class="text-red-600 text-sm">{{ $message }}</span>@enderror
        </div>

        {{-- Content --}}
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content') }}</textarea>
            <div class="mt-2">
                <button type="button" id="open-editor-media-picker"
                        class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Insert Image from Media
                </button>
            </div>
            @error('content')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Categories --}}
        <div class="mb-4">
            <label class="block text-gray-700">Categories <span class="text-red-500">*</span></label>
            <select name="categories[]" multiple required size="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">Hold Ctrl (or Cmd) to select multiple</p>
            @error('categories')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Featured Image --}}
        <div class="mb-4">
            <label class="block text-gray-700">Featured Image</label>
            <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id') }}">
            <div id="selected-media-preview" class="mt-2 hidden">
                <img id="selected-media-img" src="" alt="Selected media"
                     class="h-20 w-20 object-cover rounded">
            </div>
            <div class="mt-2 flex items-center gap-3">
                <button type="button" id="open-media-picker"
                        class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Choose from Media
                </button>
                <a href="{{ route('admin.media.index') }}" target="_blank"
                   class="text-sm text-blue-600">Manage Media Library</a>
            </div>
            @error('media_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Status --}}
        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        {{-- Featured Toggle --}}
        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured"
                       class="rounded border-gray-300 text-blue-600 shadow-sm"
                       {{ old('featured') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">Featured Post (Show on Home Page)</span>
            </label>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.posts.index') }}"
               class="mr-4 text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
        </div>
    </form>
</div>
@endsection


@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    ClassicEditor.create(document.querySelector('textarea[name="content"]'), {
        toolbar: { items: ['heading','|','bold','italic','link','bulletedList','numberedList','blockQuote','insertTable','undo','redo'] }
    }).then(editor => {
        window.postEditor = editor;
        editor.ui.view.editable.element.style.minHeight = '400px';
    }).catch(console.error);
});
</script>

<script>
(function(){
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const API_LIST = "{{ route('admin.media.list') }}";
    const API_UPLOAD = "{{ route('admin.media.store') }}";

    function createMediaModal(id, onSelect, allowUpload=true) {
        const modal = document.createElement('div');
        modal.id = id;
        modal.className = 'fixed inset-0 bg-black/50 z-50 hidden';
        modal.innerHTML = `
          <div class="min-h-screen flex items-center justify-center p-2 sm:p-4">
            <div class="bg-white rounded shadow-lg w-full max-w-5xl">
              <div class="p-3 border-b flex items-center gap-2 sticky top-0 bg-white z-10">
                <h3 class="font-semibold flex-1">Select Media</h3>
                <input type="text" id="${id}-search" placeholder="Search..." class="w-40 sm:w-60 rounded-md border-gray-300 shadow-sm px-2 py-1" />
                <button id="${id}-close" class="text-gray-600 px-2 py-1">✕</button>
              </div>
              ${allowUpload ? `
              <div class="p-3 border-b bg-white">
                <form id="${id}-upload" class="grid grid-cols-1 sm:grid-cols-5 gap-2 items-end">
                  <div>
                    <label class="block text-gray-700 text-sm">File</label>
                    <input type="file" accept="image/*" id="${id}-file" class="block w-full" required>
                  </div>
                  <div>
                    <label class="block text-gray-700 text-sm">Name</label>
                    <input type="text" id="${id}-name" class="block w-full rounded-md border-gray-300 shadow-sm" required>
                  </div>
                  <div class="sm:col-span-2">
                    <label class="block text-gray-700 text-sm">Alt</label>
                    <input type="text" id="${id}-alt" class="block w-full rounded-md border-gray-300 shadow-sm">
                  </div>
                  <div><button class="w-full px-3 py-2 bg-blue-600 text-white rounded">Upload</button></div>
                </form>
              </div>` : ''}
              <div id="${id}-grid" class="p-3 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 overflow-auto max-h-[70vh]"></div>
              <div class="p-3 border-t flex justify-between">
                <button id="${id}-load" class="px-3 py-2 bg-gray-100 rounded">Load more</button>
                <button id="${id}-cancel" class="px-3 py-2 bg-gray-200 rounded">Close</button>
              </div>
            </div>
          </div>`;
        document.body.appendChild(modal);

        const grid = modal.querySelector(`#${id}-grid`);
        const search = modal.querySelector(`#${id}-search`);
        const loadBtn = modal.querySelector(`#${id}-load`);
        const closeBtns = [modal.querySelector(`#${id}-close`), modal.querySelector(`#${id}-cancel`)];
        let state = { q:'', page:1, last:1, loading:false };

        async function fetchMedia(append=false){
            if(state.loading) return; state.loading=true;
            const res = await fetch(`${API_LIST}?q=${encodeURIComponent(state.q)}&page=${state.page}`, { headers:{'X-Requested-With':'XMLHttpRequest'} });
            const json = await res.json();
            state.last = json.meta.last_page;
            if(!append) grid.innerHTML='';
            json.data.forEach(m=>{
                const btn=document.createElement('button');
                btn.type='button'; btn.className='border rounded overflow-hidden group';
                btn.innerHTML=`<img src="${m.url}" class="w-full aspect-square object-cover group-hover:opacity-80"/><div class="p-1 text-[10px] truncate">${m.filename}</div>`;
                btn.onclick=()=>{ onSelect(m); close(); };
                grid.appendChild(btn);
            });
            loadBtn.disabled=state.page>=state.last;
            state.loading=false;
        }

        function open(){ modal.classList.remove('hidden'); state={q:'',page:1,last:1,loading:false}; search.value=''; fetchMedia(); }
        function close(){ modal.classList.add('hidden'); }
        closeBtns.forEach(b=>b.onclick=close);
        loadBtn.onclick=e=>{e.preventDefault(); if(state.page<state.last){state.page++; fetchMedia(true);} };
        search.oninput=()=>{clearTimeout(search.t); search.t=setTimeout(()=>{state.q=search.value.trim(); state.page=1; fetchMedia();},250);};

        if(allowUpload){
            modal.querySelector(`#${id}-upload`).addEventListener('submit', async e=>{
                e.preventDefault();
                const file=modal.querySelector(`#${id}-file`).files[0];
                const name=modal.querySelector(`#${id}-name`).value.trim();
                const alt=modal.querySelector(`#${id}-alt`).value.trim();
                if(!file||!name) return;
                const fd=new FormData();
                fd.append('file',file); fd.append('name',name); fd.append('alt',alt); fd.append('_token',csrf);
                const res=await fetch(API_UPLOAD,{method:'POST',headers:{'X-Requested-With':'XMLHttpRequest'},body:fd});
                if(!res.ok) return alert('Upload failed');
                const {data}=await res.json();
                onSelect(data); close();
            });
        }
        return {open,close};
    }

    // Featured image modal
    const featureModal = createMediaModal('feature-modal', m=>{
        document.getElementById('media_id').value=m.id;
        const img=document.getElementById('selected-media-img');
        const wrap=document.getElementById('selected-media-preview');
        img.src=m.url; wrap.classList.remove('hidden');
    });
    document.getElementById('open-media-picker').onclick = e => { e.preventDefault(); featureModal.open(); };

    // Editor image insert modal
    const editorModal = createMediaModal('editor-modal', m=>{
        const editor = window.postEditor;
        if(editor){
            const view = editor.data.processor.toView(`<img src="${m.url}" alt="${m.alt || m.title || m.filename}">`);
            const model = editor.data.toModel(view);
            editor.model.insertContent(model, editor.model.document.selection);
        }
    });
    document.getElementById('open-editor-media-picker').onclick = e => { e.preventDefault(); editorModal.open(); };
})();
</script>
@endpush
