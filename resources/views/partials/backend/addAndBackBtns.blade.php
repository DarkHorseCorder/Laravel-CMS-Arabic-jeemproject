<div class="d-flex justify-content-between">
    <h5 class="card-title">
        {{ $page_name }}
        @switch(Request::segment(count(Request::segments())))
            @case('edit')
                {{ trans('global.edit') }}
                @break
            @case('create')
                {{ trans('global.create') }}
                @break
            @default
        @endswitch
    </h5>
    <div class="my-auto">
        <a href="{{ $back_link }}" class="btn btn-sm btn-primary"> {{ trans('global.back_to_list') }}</a>
    </div>
</div>
