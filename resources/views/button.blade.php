{{-- <button href="javascript: void(0);" class="fs-18 px-1">
    <i class="fa-solid fa-pen-to-square text-primary"></i>
</button>
<a href="javascript: void(0);" class="fs-18 px-1">
    <i class="fa-solid fa-trash text-danger"></i>
</a> --}}

@if ($type == 'ajax-show')
    <button data-route="{{ $route }}" data-value="{{ $row->id }}" onclick="ajaxShow(this)"
        class='text-secondary _btn' title="@lang('Show-details')">
        <i class='fa fa-eye'></i>
    </button>
@endif

@if ($type == 'ajax-edit')
    <button data-route="{{ $route }}" data-value="{{ $row->id }}" onclick="ajaxEdit(this)"
        class='text-primary _btn' title="@lang('Edit')">
        <i class='fa fa-edit'></i>
    </button>
@endif

@if ($type == 'edit')
    <a href="{{ route($route . '.edit', $row->id) }}" class='text-primary _btn' title="@lang('Edit')">
        <i class='fa fa-edit'></i>
    </a>
@endif

@if ($type == 'delete')
    <button data-route="{{ route($route . '.destroy', $row->id) }}" class='_delete text-danger _btn'
        title="@lang('Delete')">
        <i class='fa fa-trash'></i>
    </button>
@endif

@if ($type == 'ajax-delete')
    <button data-route="{{ $route }}" data-value="{{ $row->id }}"
        onclick="ajaxDelete(this, '{{ $src }}')" class='text-danger _btn' title="@lang('Delete')">
        <i class='fa fa-trash' style="vertical-align: middle;"></i>
    </button>
@endif

@if ($type == 'view')
    <a href="{{ route($route . '.show', $row->id) }}" class='text-secondary _btn' title="@lang('Show-details')">
        <i class='fa fa-eye'></i>
    </a>
@endif



{{-- @if ($type == 'status')
    <span data-route="{{$route}}"
        style="font-size: 36px;line-height: 1;vertical-align: middle;cursor: pointer;" data-bs-placement="top" data-bs-toggle="tooltip"  data-bs-original-title="@lang('Status')"
        data-value="{{$row->status}}"
        onclick="changeStatus(this)" title="@lang('Status')">
        @if ($row->status == 1)
        <i class="fa fa-toggle-on text-success" title="Published"></i>
        @else
        <i class="fa fa-toggle-off text-danger" title="Unpublished"></i>
        @endif
    </span>
@endif --}}

@if ($type == 'is_active')
    <span data-route="{{ $route }}"
        style="font-size: 25px;line-height: 1;vertical-align: middle;cursor: pointer;" data-value="{{ $row }}"
        onclick="changeStatusPatch(this)">
        @if ($row == 1)
            <i class="fa fa-toggle-on text-success" title="Active"></i>
        @else
            <i class="fa fa-toggle-off text-danger" title="Inactive"></i>
        @endif
    </span>
@endif
