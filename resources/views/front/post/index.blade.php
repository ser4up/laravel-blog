@extends('front.layout.main')

@section('title', 'Posts')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h1>Posts</h1>
        </div>
        <div class="col-auto">
            
        </div>
    </div>
    @foreach($posts as $post)
        @include('front.post.partial.post-item')
    @endforeach

    {{ $posts->links() }}
@endsection()
