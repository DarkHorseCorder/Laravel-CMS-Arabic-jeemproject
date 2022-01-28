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
                                    All {{ ucfirst( request()->segment(2) ) }}
                                </li>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table table-striped table-hover datatable">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Phone</th>
                                        <th>Date/Time</th>
                                        <th></th>
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
            $('#data-table').DataTable( {
                "serverSide" : false,
                "processing" : false,
                'language': {
                    'loadingRecords': '&nbsp;',
                    'processing': 'Loading...'
                },
                "order": [4, 'desc' ],
                "pageLength": 10,
                "ajax"       : {
                    "headers"    : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    'url' : ('{{route('admin.contacts.get')}}').replace('&amp;', '&'),
                    'dataSrc':""
                },
                "columns"   : [
                    {
                        "data": "name",
                    },
                    {
                        "data": "email",
                    },
                    {
                        "data": "subject",
                    },
                    {
                        "data": "phone",
                    },
                    {
                        "data": "created_at",
                    },
                    {
                        "data": 'id',
                        "render": function (data, type, row) {
                            var html =  '<a class="btn btn-sm btn-success" href="'+('{{route('admin.contacts.show', ':id')}}').replace(':id', data)+'">';
                                html += '<i class="fa fa-eye"></i>';
                                html += '</a>';
                            return html;
                        }
                    },
                ],
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
