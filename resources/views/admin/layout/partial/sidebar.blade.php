<div class="vh-100" style="width: 200px;margin-top: -72px;padding-top: 72px;">
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('admin.home')}}">🗂️ Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('admin.posts.index')}}">📄 Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('admin.tags.index')}}">🔖 Tags</a>
        </li>
        @can('admin')
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('admin.users.index')}}">🙎‍♂️Users</a>
            </li>
        @endcan
    </ul>
</div>
