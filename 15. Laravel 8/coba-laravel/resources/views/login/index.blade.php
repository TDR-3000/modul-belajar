@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-signin">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('errorLogin'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('errorLogin') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                            required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
                </form>
                <small>Not registered? <a href="/register">Please register!</a></small>
            </main>
        </div>
    </div>
@endsection
