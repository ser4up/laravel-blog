@extends('admin.layout.main')

@section('title', 'Edit Post')

@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
      </ol>
    </nav>

    <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 w-50">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50"">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror"  id="description" name="description" rows="3">{{ old('description', $post->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ is_array(old('tags', $post->tagIds())) && in_array($tag->id, old('tags', $post->tagIds()))?' selected':''}}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            @if (!empty($post->image))
                <div class="mt-3">
                    <image src="{{ asset($post->image) }}" width="150" />
                </div>
            @endif
        </div>
        <input type="submit" class="btn btn-primary" value="Save changes">
    </form>
@endsection()
