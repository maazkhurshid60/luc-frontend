<div>
    @can('user.edit')
        <a href="{{ route('user.edit', $user_id) }}" class="btn btn-xs btn-primary">{{ __('Edit') }} </a>
        @can('role.edit')
            <a href="javascript:assignRole({{ $user_id }})" class="btn btn-xs btn-warning  ">{{ __('Role') }} </a>
        @endcan
    @endcan
</div>
