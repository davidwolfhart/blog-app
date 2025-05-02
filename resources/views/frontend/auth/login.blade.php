@extends('frontend.layouts.frontend')

@section('css')
    {{-- Sign-in CSS --}}
    <link href="/css/sign-in.css" rel="stylesheet">
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center"><b>LOGIN</b></h1>

                <form method="post" action="/login">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="email"
                            class="form-control  @error('email') is-invalid @enderror @error('invalid_credentials') is-invalid @enderror"
                            id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}"
                            required autofocus>
                        <label for="email">Email address</label>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @error('invalid_credentials')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Password" required>
                        <label for="password">Password</label>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 py-2  mb-3" type="submit">Sign in</button>
                </form>

                <small class="d-block text-center">Not registered? <a href="/register">Register now!</a></small>
            </main>
        </div>
    </div>
@endsection
