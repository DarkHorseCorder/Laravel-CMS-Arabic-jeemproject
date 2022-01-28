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
                                <a class="nav-link active" href="{{ route('admin.main-page.create') }}">
                                    Update Setting
                                </a>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Sections</th>
                                        <th>Locale</th>
                                        <th>Post</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($main_page_sections))
                                        @foreach ($main_page_sections as $sections)
                                            <tr>
                                                <td class="align-middle">
                                                    {{ $sections->sections }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $sections->locale }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="#">
                                                        <img src="{{ url(config('app.file_base_url') . $sections->post->image_path ) }}" alt="{{ $sections->post->title }}" style="height: 60px; margin-right: 10px;">
                                                        {{ $sections->post->title }}
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Action group">

                                                        <a href="{{ route('admin.main-page.edit', $sections->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                                        <form id="form-delete" action="{{route('admin.main-page.destroy', $sections->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                        </form>

                                                    </div>
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

@endsection
