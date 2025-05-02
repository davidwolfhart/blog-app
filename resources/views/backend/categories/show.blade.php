@extends('backend.layouts.dashboard')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>{{ $category->name }}</h2>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}}
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3 mb-3 ">
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid col-sm-6">
            @else
                <img src="{{ asset('storage/category-images/no-image.jpg') }}" alt="{{ $category->name }}"
                    class="img-fluid col-sm-6">
            @endif
        </div>

        <div class="row">
            <p class="mb-3">{{ $category->description }}</p>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-1">#</th>
                            <th class="col-6">Title</th>
                            <th class="col-2">Author</th>
                            <th class="col-1">Published Date</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ 'No Name' }}</td>
                                <td>{{ date('d-m-Y') }}</td>
                                <td>
                                    <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye me-1"></i>Detail
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <a href="/dashboard/categories" class="btn btn-secondary">
                <i class="bi bi-arrow-left-square me-1"></i>Back
            </a>
        </div>
    </div>
@endsection
