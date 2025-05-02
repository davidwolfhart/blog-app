@extends('frontend.layouts.frontend')

@section('main')
    @if ($categories->count())
        <div class="row border-bottom mb-3">
            <h2>All Categories</h2>
        </div>

        <div class="album py-3 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    @foreach ($categories as $category)
                        <div class="col mb-3">
                            <a class="text-decoration-none" href="/posts?category={{ $category->slug }}">
                                <div class="card shadow-sm">

                                    <div class="d-flex align-items-stretch" style="height: 200px;">
                                        @if ($category->image)
                                            <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                                src="{{ asset('storage/' . $category->image) }}"
                                                alt="{{ $category->slug }}">
                                        @else
                                            <img class="img-fluid card-img-top w-100 h-100 object-fit-contain"
                                                src="{{ asset('storage/category-images/no-image.jpg') }}"
                                                alt="{{ $category->slug }}">
                                        @endif
                                    </div>

                                    <div class="card-body text-center">
                                        <h3><b>{{ $category->name }}</b></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>There is no Categories</h2>
            <p>Sorry no Categories here.</p>
        </div>
    @endif
@endsection
