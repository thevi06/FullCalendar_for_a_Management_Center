@can('role-edit')
    @if($role->name != 'super-admin')
        <a class="btn btn-warning" href="{{route('role.edit-role', $role->id)}}">Edit</a>
    @endif
@endcan
