@extends('frontend.layouts.frontend')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1>Posts in {{ $category->name }}</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}}
        </div>
    </div>

    {{-- Search Bar --}}
    @include('frontend.partials.search')

    @if ($category->posts->count())
        <div class="album py-3 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    @foreach ($category->posts as $post)
                        <div class="col mb-3">
                            <div class="card shadow-sm">

                                <div class="d-flex align-items-stretch" style="height: 200px;">
                                    @if ($post->image)
                                        <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                            src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->slug }}">
                                    @else
                                        <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                            src="{{ asset('storage/post-images/no-image.jpg') }}" alt="{{ $post->slug }}">
                                    @endif
                                </div>

                                <div class="card-body">
                                    <small class="text-muted mb-3">
                                        Published by:
                                        <a class="text-decoration-none"
                                            href="/users/{{ $post->user->username }}">{{ $post->user->name }}</a>
                                        in
                                        <a class="text-decoration-none"
                                            href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                                    </small>

                                    <p class="card-text">{{ $post->excerpt }}</p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>

                                        <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>There is no Posts</h2>
            <p>Sorry no posts here.</p>
        </div>
    @endif
@endsection
