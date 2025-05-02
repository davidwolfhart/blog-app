@extends('backend.layouts.dashboard')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ $post->title }}</h2>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}}
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <p>Category: {{ $post->category->name }}</p>

                <div>
                    <a href="/dashboard/posts" class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left-square me-1"></i>Back
                    </a>

                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil-square me-1"></i>Edit
                    </a>

                    <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete post {{ $post->name }}?')">
                            <i class="bi bi-x-square me-1"></i>Delete</button>
                    </form>
                </div>

                {{-- <div style="max-height:350px "> --}}
                <div class="mt-3">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->slug }}" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/post-images/no-image.jpg') }}" alt="{{ $post->slug }}"
                            class="img-fluid">
                    @endif
                </div>

                <article class="mb-5 mt-3" style="text-align: justify;">
                    <?= $post->body ?>
                </article>
            </div>
        </div>
    </div>
@endsection
