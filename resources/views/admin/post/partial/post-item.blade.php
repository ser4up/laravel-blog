<tr>
    <th scope="row">{{ $post->id }}</th>
    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{ $post->title }}</a></td>
    <td>
        <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-title="Edit">✍</a>
        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-title="Remove">❌</button>
        </form>
    </td>
</tr>
