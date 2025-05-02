@extends('frontend.layouts.frontend')

@section('main')

    <div class="row border-bottom mb-3">
        <h2>{{ $title }}</h2>
    </div>

    {{-- Search Bar --}}
    @include('frontend.partials.search')

    @if ($posts->count())
        <div class="container">
            <div class="row">
                <div class="card mb-3">
                    <div class="d-flex align-items-stretch mb-3 mt-3" style="height: 400px;">
                        @if ($posts[0]->image)
                            <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->slug }}">
                        @else
                            <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                src="{{ asset('storage/post-images/no-image.jpg') }}" alt="{{ $posts[0]->slug }}">
                        @endif
                    </div>

                    <div class="card-body">
                        <h3 class="card-title">{{ $posts[0]->title }}</h3>
                        <small class="text-muted mb-3">
                            Published by:
                            <a class="text-decoration-none"
                                href="/users/{{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                            in
                            <a class="text-decoration-none"
                                href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        </small>
                        <p class="card-text">{{ $posts[0]->excerpt }}</p>

                        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="album py-3 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    @foreach ($posts->skip(1) as $post)
                        <div class="col mb-3">
                            <div class="card shadow-sm">

                                <div class="d-flex align-items-stretch" style="height: 200px;">
                                    @if ($post->image)
                                        <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                            src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->slug }}">
                                    @else
                                        <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                            src="{{ asset('storage/post-images/no-image.jpg') }}"
                                            alt="{{ $post->slug }}">
                                    @endif
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <small class="text-muted mb-3">
                                        Published by:
                                        <a class="text-decoration-none"
                                            href="/users/{{ $post->user->username }}">{{ $post->user->name }}</a>
                                        in
                                        <a class="text-decoration-none"
                                            href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
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

    {{ $posts->links() }}
@endsection
