@extends('front.layout.main')

@section('title', 'Sign in')

@section('content')
    <form action="{{route('auth.signin.action')}}" method="POST" class="m-auto mt-5" style="width: 400px;">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>

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

        <input type="submit" class="btn btn-primary w-100 py-2" value="Sign in">
    </form>
@endsection()
