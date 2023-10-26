@extends('front.layout.main')

@section('title', 'Sign up')

@section('content')
    <form action="{{route('auth.signup.action')}}" method="POST" class="m-auto mt-5" style="width: 400px;">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Sign up</h1>

        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            <label for="password">Password</label>
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-floating mb-2">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            <label for="password_confirmation">Password confirmation</label>
            @error('password_confirmation')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary w-100 py-2" value="Sign up">
    </form>
@endsection()
