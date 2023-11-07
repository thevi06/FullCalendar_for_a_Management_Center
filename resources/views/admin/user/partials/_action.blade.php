@can('user-edit')
    @if($user['role']->name != 'super-admin')
        <a class="btn btn-warning" href="{{route('users.edit-user', $user['id'])}}">
            <i class="fa fa-edit"></i> Edit
        </a>
    @endif
@endcan
@can('user-delete')
    @if($user['role']->name != 'super-admin')
        <form method="POST" action="{{route('users.delete-user', $user->id)}}" class="d-inline"
              onsubmit="return submitUserDeleteForm(this)">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> Delete
            </button>
        </form>
    @endif
@endcan
