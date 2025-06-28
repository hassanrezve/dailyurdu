@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $post->title }}</h1>
    <p class="text-slate-400 text-xs urdu-text mb-3">👁️ {{ $post->views }} بار دیکھا گیا</p>

    @if($post->image_url)
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid mb-4">
    @endif

    <div class="mb-5">
        {!! $post->content !!}
    </div>

    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">← Back to Blogs</a>
</div>
@endsection
