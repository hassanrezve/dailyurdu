@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Latest Blogs</h1>

    @forelse ($posts as $post)
        <div class="mb-5 border-bottom pb-3">
            <h2>{{ $post->title }}</h2>
            @if($post->image_url)
                <img src="{{ asset($post->image_url) }}" alt="{{ $post->title }}" style="max-width: 300px;">
            @endif
            <div>{!! Str::limit(strip_tags($post->content), 150) !!}</div>
            <a href="{{ route('blogs.show', $post->slug) }}">Read more</a>

        </div>
    @empty
        <p>No blog posts found.</p>
    @endforelse
</div>
@endsection
