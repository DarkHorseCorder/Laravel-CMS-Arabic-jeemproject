@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div id="" class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-0 ">
                            <ul class="nav nav-pills p-2 ml-auto">
                                <a class="nav-link {{ request()->routeIs('admin.comments.index')  ? 'active' : '' }}" href="{{ route('admin.comments.create') }}">
                                    Add Author
                                </a>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="data-table" class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name (ar)</th>
                                        <th>Name (en)</th>
                                        <th>Name (de)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $author)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> {{ $author->getTranslation('name', 'ar') ?? '-' }} </td>
                                            <td> {{ $author->getTranslation('name', 'en') ?? '-' }} </td>
                                            <td> {{ $author->getTranslation('name', 'de') ?? '-' }} </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="Action group">
                                                    {{-- <a href="{{ route('admin.comments.show', $author->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a> --}}

                                                    <a href="{{ route('admin.comments.edit', $author->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <form id="form-delete" action="{{route('admin.comments.destroy', $author->id)}}" method="POST" onsubmit="return confirm('Posts/Blogs related to this author will also be deleted.')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
    {{-- <script>
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
                    'url' : ('{{route('admin.comments.get')}}').replace('&amp;', '&'),
                    'dataSrc':""
                },
                "columns"   : [
                    {
                        "data": "name",
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
                                html += '    <a href="'+('{{route('admin.comments.edit', ':slug')}}').replace(':slug', data)+'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>';
                                html += '    <form action="'+('{{route('admin.comments.destroy', ':slug')}}').replace(':slug', data)+'" method="POST" onsubmit="return confirm('+'Are you sure'+');">';
                                html += '       <input type="hidden" name="_method" value="DELETE">';
                                html += '       <input type="hidden" name="_token" value="{{ csrf_token() }}">';
                                html += '       <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                                html += '   </form>';
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
    </script> --}}
@endsection
