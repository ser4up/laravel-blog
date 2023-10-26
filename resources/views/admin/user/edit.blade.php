@extends('admin.layout.main')

@section('title', 'Edit User')

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
      </ol>
    </nav>

    <form action="{{route('admin.users.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 w-50">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror"" id="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="roles" class="form-label">Roles</label>
            <select class="form-select @error('roles') is-invalid @enderror" id="roles" name="roles[]" multiple>
                @foreach($roles as $roleKey => $roleName)
                    <option value="{{ $roleKey }}" {{ is_array(old('roles', $user->roles)) && in_array($roleKey, old('roles', $user->roles))?' selected':''}}>{{ $roleName }}</option>
                @endforeach
            </select>
            @error('roles')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"" id="password" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="password_confirmation" class="form-label">Confirm password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Save changes">
    </form>
@endsection()
