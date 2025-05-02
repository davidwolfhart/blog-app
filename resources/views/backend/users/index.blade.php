@extends('backend.layouts.dashboard')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Users</h2>
    </div>

    {{-- Alert --}}
    @include('backend.partials.alert')

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-4">Name</th>
                    <th class="col-4">Email</th>
                    <th class="col-1">Post</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->posts->count() }}</td>
                        <td>
                            <a href="/dashboard/users/{{ $user->slug }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye me-1"></i>Detail
                            </a>

                            <a href="/dashboard/users/{{ $user->slug }}/edit" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square me-1"></i>Edit
                            </a>

                            <form method="post" action="/dashboard/users/{{ $user->slug }}" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete user {{ $user->name }}?')">
                                    <i class="bi bi-x-square me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
