<div class="row mb-2">
    <div class="card">
      <div class="row g-0">
        <div class="col" style="max-width:250px">
            <a href="{{route('posts.show', $post->id)}}">
                <img src="{{ asset($post->image) }}" class="img-fluid rounded-start mt-3">
            </a>
        </div>
        <div class="col">
          <div class="card-body">
            <a href="{{route('posts.show', $post->id)}}" class="link-dark">
                <h5 class="card-title">{{ $post->title }}</h5>
            </a>
            <p class="card-text">{{ $post->description }}</p>
            <p class="card-text"><small class="text-body-secondary">{{ $post->createdAt }}</small></p>
          </div>
        </div>
      </div>
    </div>
</div>