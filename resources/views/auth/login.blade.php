@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">

        <h1 class="mb-4">Login</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >

                @error('email')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required
                >

                @error('password')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Log in
            </button>

        </form>

        <p class="mt-3">
            Don't have an account?
            <a href="{{ route('register') }}">Register here</a>
        </p>

    </div>
</div>
@endsection