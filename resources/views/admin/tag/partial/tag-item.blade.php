<tr>
    <th scope="row">{{ $tag->id }}</th>
    <td><a href="{{route('admin.tags.edit', $tag->id)}}">{{ $tag->name }}</a></td>
    <td>
        <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-title="Edit">✍</a>
        <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-title="Remove">❌</button>
        </form>
    </td>
</tr>