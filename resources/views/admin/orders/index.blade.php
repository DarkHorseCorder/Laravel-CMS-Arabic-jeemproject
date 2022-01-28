@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div id="orders" class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-0 ">
                            <ul class="nav nav-pills p-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.orders.index') ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['status' => null]) }}">
                                        All {{ ucfirst( request()->segment(2) ) }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="order-data-table" class="table table-striped table-hover datatable">
                                <thead class="text-center">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Topic</th>
                                        <th>Deadline</th>
                                        <th>Total Cost</th>
                                        <th>Date</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody" class="text-center"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

@endsection
@section('scripts')
    @parent
    <script>
        $( document ).ready(function() {

            const url = ('{{route('admin.orders.get', ['status' => request()->query('status') ?? '' ] )}}').replace('&amp;', '&');

            $('#order-data-table').DataTable( {
                "serverSide" : false,
                "processing" : false,
                'language': {
                    'loadingRecords': '&nbsp;',
                    'processing': 'Loading...'
                },
                "order": [[ 1, 'asc' ]],
                "pageLength": 10,
                "ajax"       : {
                    "headers"    : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    'url' : url,
                    'dataSrc':""
                },
                "columns"   : [
                    {
                        "data": "id",
                        "render": function (data, type, row) {
                            var html =  '<a href="'+('{{route('admin.orders.show', ':id')}}').replace(':id', data)+'">';
                                html += '<strong>#'+ data +'</strong>';
                                html += '</a>';
                            return html;
                        }
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "topic",
                        "class" : "text-left",
                        "render": function (data, type, row) {
                            return data;
                        }
                    },
                    {
                        "data": "deadline",
                        "class" : "text-left",
                        "render": function (data, type, row) {
                            return data;
                        }
                    },
                    {
                        "data": "amount_pretty",
                        "render": function (data, type, row) {
                            return '<div class="d-flex justify-content-between px-3 bg-light py-2"><span class="font-weight-bold">'+ data +'</span></div>';
                        }
                    },
                    {"data": 'created_at_pretty' },
                    {
                        "data": "status",
                        "render": function (data, type, row) {
                            return '<span class="badge '+data.css_class+'">'+data.name+'</span>';
                        }
                    },
                ],
                "columnDefs": [
                    { "width": "20%", "targets": 1 }
                ]
            });


            $(function() {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

                $.extend(true, $.fn.dataTable.defaults, {
                    orderCellsTop: true,
                });

                $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            })
        });
    </script>
@endsection
