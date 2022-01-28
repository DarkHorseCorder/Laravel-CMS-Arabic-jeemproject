@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div id="" class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">First Panel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Second Panel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Third Panel</a>
                            </li>
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <p>First Panel</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <p>Second Panel</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <p>Third Panel</p>
                            </div>
                        </div>

                        <form class="border p-3 mx-4 mt-4 mb-2" method="POST" action="{{ route("admin.main-page.store") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="required" for='sections'> Sections </label>
                                        <select name="sections" class="form-control select2">
                                            @foreach ($page_sections as $section)
                                                <option value="{{ $section->name }}"> {{ $section->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="required" for='sections'> Locales </label>
                                        <select id="change-locale" name="locale" class="form-control select2">
                                            @foreach(config('translatable.locales') as $locale)
                                                <option value="{{ $locale }}"> {{ $locale }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="required" for='sections'> Post </label>
                                        <select id="posts" name="post_id" class="form-control select2">

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

                        <div class="d-none border p-3 mx-4 my-2">
                            <label class="required" for="posts"> Section B</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-none border p-3 mx-4 my-2">
                            <label class="required" for="posts"> Section C </label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none border p-3 mx-4 my-2">
                            <label class="required" for="posts"> Section D</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none border p-3 mx-4 my-2">
                            <label class="required" for="posts"> Section E</label>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <select class="form-control select2 {{ $errors->has('posts') ? 'is-invalid' : '' }}" name="sec_a" id="sec_a" required>
                                            @foreach($posts as $id => $post)
                                                <option value="{{$post->id }}" {{ old('sec_a') ? 'selected' : '' }}>
                                                    {{ $post->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('sec_a'))
                                            <span class="text-danger">{{ $errors->first('sec_a') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
       </div>
    </div>

@endsection
@section('scripts')

    <script>
        const posts = @json($posts)

        $("#change-locale").change(function() {
            var html = '';
            posts.forEach(post => {
                html += '<option value="'+post.id+'">'+post.title[this.value]+'</option>';
            });
            $('#posts').empty();
            $('#posts').html(html);
        });

    </script>

@endsection
