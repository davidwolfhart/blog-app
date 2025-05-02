@extends('frontend.layouts.frontend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1>{{ $post->title }}</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}}
        </div>
    </div>

    <div class="d-flex align-items-stretch mb-3 mt-3" style="height: 400px;">
        @if ($post->image)
            <img class="img-fluid w-100 h-100 object-fit-contain" src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->slug }}">
        @else
            <img class="img-fluid w-100 h-100 object-fit-contain" src="{{ asset('storage/post-images/no-image.jpg') }}"
                alt="{{ $post->slug }}">
        @endif
    </div>

    <div class="container mb-5 mt-3">
        <p>
            <small class="text-muted">
                By {{ $post->user->name }} in {{ $post->category->name }} at {{ $post->created_at->diffForHumans() }}
            </small>
        </p>

        <article class="mb-3" style="text-align: justify;">
            <?= $post->body ?>
        </article>

        <a href="/posts" class="btn btn-sm btn-secondary">
            <i class="bi bi-arrow-left-square me-1"></i>Back to post
        </a>
    </div>
@endsection
