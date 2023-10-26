@extends('admin.layout.main')

@section('title', 'Posts')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h1>Posts</h1>
        </div>
        <div class="col-auto">
            <a href="{{route('admin.posts.create')}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-title="Add">Add Post</a>
        </div>
    </div>

    @if (!$posts->isEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col" style="width: 100px;">#</th>
                  <th scope="col">title</th>
                  <th scope="col" style="width: 100px;">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    @include('admin.post.partial.post-item')
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    @else
        <p class="text-center text-primary fs-4">Posts not found.</p>
    @endif
@endsection()

@section('script')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
@endsection()
