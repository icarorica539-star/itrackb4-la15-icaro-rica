@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Register</h1>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password"
                   class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password"
                   name="password_confirmation"
                   class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </form>
</div>
@endsection
