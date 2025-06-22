@if ($paginator->hasPages())
<div class="flex justify-center space-x-2 space-x-reverse mb-12">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span class="bg-white text-slate-400 px-4 py-2 rounded-lg border border-slate-200 urdu-text">پچھلا</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors urdu-text">پچھلا</a>
    @endif

    {{-- Pagination Elements --}}
    @php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);
    @endphp

    @if ($start > 1)
    <a href="{{ $paginator->url(1) }}" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">1</a>
    @if ($start > 2)
    <span class="px-2 text-slate-500">...</span>
    @endif
    @endif

    @for ($i = $start; $i <= $end; $i++)
    @if ($i == $current)
    <span class="bg-indigo-600 text-white px-4 py-2 rounded-lg">{{ $i }}</span>
    @else
    <a href="{{ $paginator->url($i) }}" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">{{ $i }}</a>
    @endif
    @endfor

    @if ($end < $last)
    @if ($end < $last - 1)
    <span class="px-2 text-slate-500">...</span>
    @endif
    <a href="{{ $paginator->url($last) }}" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">{{ $last }}</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="bg-white text-slate-600 px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors urdu-text">اگلا</a>
    @else
    <span class="bg-white text-slate-400 px-4 py-2 rounded-lg border border-slate-200 urdu-text">اگلا</span>
    @endif
</div>
@endif
