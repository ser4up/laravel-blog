@extends('admin.layout.main')

@section('title', 'Tags')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h1>Tags</h1>
        </div>
        <div class="col-auto">
            <a href="{{route('admin.tags.create')}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-title="Add">Add Tag</a>
        </div>
    </div>

    @if (!$tags->isEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col" style="width: 100px;">#</th>
                  <th scope="col">name</th>
                  <th scope="col" style="width: 100px;">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    @include('admin.tag.partial.tag-item')
                @endforeach
            </tbody>
        </table>

        {{ $tags->links() }}
    @else
        <p class="text-center text-primary fs-4">Tags not found.</p>
    @endif
@endsection()

@section('script')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
@endsection()