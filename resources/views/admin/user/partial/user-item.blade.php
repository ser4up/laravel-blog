<tr>
    <th scope="row">{{ $user->id }}</th>
    <td><a href="{{route('admin.users.edit', $user->id)}}">{{ $user->name }}</a></td>
    <td><a href="{{route('admin.users.edit', $user->id)}}">{{ $user->email }}</a></td>
    <td>
        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-title="Edit">✍</a>
        <form action="{{route('admin.users.destroy', $user->id)}}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-light btn-sm" data-bs-toggle="tooltip" data-bs-title="Remove">❌</button>
        </form>
    </td>
</tr>
