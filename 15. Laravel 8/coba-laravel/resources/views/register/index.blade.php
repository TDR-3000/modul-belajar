@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <main class="form-signin">
                <form action="/register" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                    <div class="form-floating">
                        <input type="Name" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" name="name" autofocus required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="username" class="form-control @error('username') is-invalid @enderror" id="username"
                            placeholder="Username" name="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                            placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small>All ready registered? <a href="/login">Please login!</a></small>
            </main>
        </div>
    </div>
@endsection
