@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div id="" class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="border p-3 mx-4 mt-4 mb-2" method="POST" action="{{ route("admin.main-page.update", $main_page->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="required" for='sections'> Sections </label>
                                        <select name="sections" class="form-control select2">
                                            @foreach ($page_sections as $section)
                                                <option {{ old('sections', $main_page->sections) == $section->name ? "selected" : ""  }} value="{{ $section->name }}"> {{ $section->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="required" for='sections'> Locales </label>
                                        <select name="locale" class="form-control select2">
                                            @foreach(config('translatable.locales') as $locale)
                                                <option {{ old('sections', $main_page->locale) == $locale ? "selected" : ""  }} value="{{ $locale }}"> {{ $locale }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="required" for='sections'> Post </label>
                                        <select name="post_id" class="form-control select2">
                                            @foreach($posts as $id => $post)
                                                <option {{ old('sections', $main_page->post_id) == $post->id  ? "selected" : ""  }} value="{{$post->id }}" > {{ $post->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>

@endsection
@section('scripts')
    @parent

@endsection
