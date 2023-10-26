<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
      <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="{{route('home')}}" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="{{route('posts.index')}}" class="nav-link px-2">Posts</a></li>
    </ul>

    <div class="col-md-3 text-end">
        @guest('web')
            <a href="{{route('auth.signin')}}" class="btn btn-outline-primary me-2">Sign in</a>
            <a href="{{route('auth.signup')}}" class="btn btn-primary">Sign-up</a>
        @endguest

        @auth('web')
            <a href="{{route('admin.home')}}" class="btn btn-outline-primary me-2">Admin panel</a>
        @endauth
    </div>
  </header>
</div>