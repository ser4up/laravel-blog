@extends('admin.layout.main')

@section('title', 'Add Tag')

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.tags.index')}}">Tags</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Tag</li>
      </ol>
    </nav>

    <form action="{{route('admin.tags.store')}}" method="POST">
        @csrf
        <div class="mb-3 w-50">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Add Tag">
    </form>
@endsection()
