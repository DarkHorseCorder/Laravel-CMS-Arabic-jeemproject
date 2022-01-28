@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-0 justify-content-between">
                            <ul class="nav nav-pills p-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.invoices.index')  ? 'active' : '' }}" href="{{ route('admin.invoices.index') }}">
                                        All Invoices
                                    </a>
                                </li>
                                @foreach ($invoices_status as $invoice_status)
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query('status') == $invoice_status->slug ? 'active' : '' }}" href="{{ route('admin.invoices.index', array('status' => $invoice_status->slug) ) }}">
                                            {{ $invoice_status->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- <ul class="nav nav-pills p-2 ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.invoices.index')  ? 'active' : '' }}" href="{{ route('admin.invoices.index') }}">
                                        Update Invoice
                                    </a>
                                </li>
                            </ul> --}}
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover datatable ">
                                <thead>
                                    <tr>
                                        <th>Reference No.</th>
                                        <th>Order ID</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($invoices))
                                        @foreach ($invoices as $invoice)

                                            <tr>
                                                <td>
                                                    <a href="{{route('admin.invoices.show', $invoice->ref_no)}}">
                                                        <strong>{{ \Illuminate\Support\Str::limit(strip_tags($invoice->ref_no), 16) }}</strong>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.orders.show', $invoice->order->id)}}">
                                                        <strong>{{ '# '. $invoice->order->id }}</strong>
                                                    </a>
                                                </td>
                                                <td>{{ addCurrency($invoice->amount) }}</td>
                                                <td>{{ showDate($invoice->created_at) }}</td>
                                                <td>{{ $invoice->currency ?? '-' }} </td>
                                                <td>
                                                    @switch($invoice->status_id)
                                                        @case(4)
                                                            <span class="badge {{$invoice->status->css_class}}">{{$invoice->status->name}}</span>
                                                            @break
                                                        @case(5)
                                                            <span class="badge {{$invoice->status->css_class}}">{{$invoice->status->name}}</span>
                                                            @break
                                                        @default
                                                            <span class="badge badge-default"> Default </span>
                                                    @endswitch
                                                </td>
                                                <td>
                                                    {{-- @can('') --}}
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.invoices.edit', $invoice->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    {{-- @endcan --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tr>
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
            orderCellsTop: true,
            order: [
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
