@extends('backend.layouts.dashboard')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Categories</h2>

        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}}
            <a href="/dashboard/categories/deleted" class="btn btn-warning m-1"><i class="bi bi-trash3 me-1"></i>Deleted
                Categories</a>
            <a href="/dashboard/categories/create" class="btn btn-success m-1"><i class="bi bi-plus-square me-1"></i>Add
                New</a>
        </div>
    </div>

    {{-- Alert --}}
    @include('backend.partials.alert')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-8">Category Name</th>
                    <th class="col-1">Total Post</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye me-1"></i>Detail
                            </a>

                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </a>

                            <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete category {{ $category->name }}?')">
                                    <i class="bi bi-x-square me-1"></i>Delete</button>
                            </form>

                            {{-- Delete Confirmation Using Modal --}}

                            {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteConfirmation-{{ $category->slug }}">
                                <i class="bi bi-x-square me-1"></i>Delete</button> --}}

                            {{-- <div class="modal fade" id="deleteConfirmation-{{ $category->slug }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Confirmation</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete category {{ $category->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>

                                            <form method="post" action="/dashboard/categories/{{ $category->slug }}"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
