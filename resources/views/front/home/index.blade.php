@extends('front.layout.main')

@section('title', 'Home')

@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="max-height: 650px;">
        @foreach($posts as $key => $post)
            <div class="carousel-item @if ($key == 0) active @endif">
                <a href="{{route('posts.show', $post->id)}}">
                    <img src="{{ asset($post->image) }}" class="d-block w-100">
                </a>
            </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
@endsection()
