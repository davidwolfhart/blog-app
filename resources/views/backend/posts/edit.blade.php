@extends('backend.layouts.dashboard')

@section('css')
    {{-- Trix Editor CSS --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

    {{-- Remove Attach File --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endsection

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Edit Post</h2>
    </div>

    <div class="col-lg-8 mb-3">
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $post->title) }}" autofocus>

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $post->slug) }}" disable readonly>

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>

                <select class="form-select" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id', $post->category_id) == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                    @if ($post->image) src="{{ asset('storage/' . $post->image) }}" @endif>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" onchange="previewImage()">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>

                <input type="hidden" id="body" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>

                @error('body')
                    <p class="text-danger text-small">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/dashboard/posts" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

@section('js')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener("change", function() {
            let preslug = title.value.trim();
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>

    {{-- Preview Image --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');
            // imagePreview.style.display = 'block';

            // const fileReader = new FileReader();
            // fileReader.readAsDataURL(image.files[0]);
            // fileReader.onLoad = function(e) {
            //     imagePreview.src = e.target.result;
            // }

            const blob = URL.createObjectURL(image.files[0]);
            imagePreview.src = blob;
        }
    </script>

    {{-- Trix Editor JS --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
