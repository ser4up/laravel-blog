@extends('front.layout.main')

@section('title', $post->title . ' - Post')

@section('content')
    @include('front.post.partial.post-item')
@endsection()
