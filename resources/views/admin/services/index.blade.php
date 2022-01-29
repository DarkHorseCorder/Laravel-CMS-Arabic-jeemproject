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
                            <ul class="nav nav-pills p-2 ml-auto">
                                <a class="nav-link {{ request()->routeIs('admin.services.index')  ? 'active' : '' }}" href="{{ route('admin.services.create') }}">
                                    Add Service
                                </a>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Canonical</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
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
                "processing" : true,
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
                    'url' : ('{{route('admin.services.get')}}').replace('&amp;', '&'),
                    'dataSrc':""
                },
                "columns"   : [
                    {
                        "data": "name",
                    },
                    {
                        "data": "title",
                    },
                    {
                        "data": "slug",
                    },
                    {
                        "data": "canonical",
                        "render": function (data, type, row) {
                            return '<a href="'+data+'" target="_blank">'+data+'</a>';
                        }
                    },
                    {
                        "data": "is_published",
                        "render": function (data, type, row) {
                            return data ? '<span class="badge badge-success">Publish</span>' : '<span class="badge badge-danger">Not Publish</span>';
                        }
                    },
                    {
                        "data": 'slug',
                        "render": function (data, type, row) {

                            var html =  '<div class="btn-group" role="group">';
                                html += '    <a href="'+('{{route('services.show', ':slug')}}').replace(':slug', data)+'" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>';
                            html += '    <a href="'+('{{route('admin.services.edit', ':slug')}}').replace(':slug', data)+'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';
                                html += '</div>';

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
