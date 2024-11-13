@can('menu.edit')
    <a href="{{ route('menu.edit', $id) }}" class="btn btn-xs btn-primary">Edit</a>
@endcan
@can('menu.delete')
    <a href="javascript:delete_record({{ $id }} )" class="btn btn-xs btn-danger">Delete</a>
@endcan
