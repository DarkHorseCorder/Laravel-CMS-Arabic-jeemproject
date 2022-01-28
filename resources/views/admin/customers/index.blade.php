@extends('layouts.admin')
@section('content')

   @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills p-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.customers.index')  ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">
                                        All Customers
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Verified</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($customers))
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{Str::ucfirst($customer->name)}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->phone}}</td>
                                                <td>{{$customer->country ?? '--'}}</td>
                                                <td>
                                                    @if ($customer->email_verified_at)
                                                        <span class="badge badge-info">Verified</span>
                                                    @else
                                                        <span class="badge badge-warning">Not Verified</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- @can('') --}}
                                                        <a class="btn btn-xs btn-info" href="{{ route('admin.customers.show', $customer->id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    {{-- @endcan --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

@endsection
@section('scripts')
@parent
<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            customerCellsTop: true,
            customer: [
                [1, 'desc']
            ],
            pageLength: 100,

        });
        let table = $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
