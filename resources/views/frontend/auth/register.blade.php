@extends('frontend.layouts.frontend')

@section('css')
    {{-- Sign-in CSS --}}
    <link href="/css/sign-in.css" rel="stylesheet">
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center"><b>REGISTER</b></h1>

                <form method="post" action="/register">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="name" value="{{ old('name') }}" required autofocus>
                        <label for="name">Full Name</label>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="username" value="{{ old('username') }}" required>
                        <label for="username">Username</label>

                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="email">Email address</label>

                        @error('email')
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

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Retype Password" required>
                        <label for="password_confirmation">Retype Password</label>
                    </div>

                    <button class="btn btn-primary w-100 py-2  mb-3" type="submit">Register</button>
                </form>

                <small class="d-block text-center">Already registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
