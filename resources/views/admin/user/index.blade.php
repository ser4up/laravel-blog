@extends('admin.layout.main')

@section('title', 'Users')

@section('content')
    <div class="row mt-2">
        <div class="col">
            <h1>Users</h1>
        </div>
        <div class="col-auto">
            <a href="{{route('admin.users.create')}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-title="Add">Add User</a>
        </div>
    </div>

    @if (!$users->isEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col" style="width: 100px;">#</th>
                  <th scope="col">name</th>
                  <th scope="col">email</th>
                  <th scope="col" style="width: 100px;">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @include('admin.user.partial.user-item')
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    @else
        <p class="text-center text-primary fs-4">Users not found.</p>
    @endif
@endsection()

@section('script')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    </script>
@endsection()
