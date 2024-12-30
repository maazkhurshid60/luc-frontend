<div class="btn-group">
    <button type="button" class="btn btn-info btn-xs">Edit</button>
    <button type="button" class="btn btn-info btn-xs dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        @can('menu.edit')
            <a class="dropdown-item" href="{{ route('menu.edit', $id) }}?lang=en">Edit (EN)</a>
            <a class="dropdown-item" href="{{ route('menu.edit', $id) }}?lang=fr">French</a>
        @endcan
    </div>
</div>
@can('menu.delete')
    <a href="javascript:delete_record({{ $id }} )" class="btn btn-danger btn-xs">Delete</a>
@endcan
