@extends('layouts.admin')

@section('styles')
    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
@endsection
@section('content')

    @include('partials.backend.admin-breadcrum')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blogs.update", [$blog->slug]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="required" for="title">Title</label>
                    <input class="get-slug form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" >
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="slug">Slug</label>
                    <input class="get-slug form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}" >
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="canonical">Canonical</label> <small>(change <b>Title</b> or <b>Slug</b> value)</small>
                    <input class="form-control {{ $errors->has('canonical') ? 'is-invalid' : '' }}" type="url" readonly name="canonical" id="canonical" value="{{ old('canonical', $blog->canonical) }}" >
                    @if($errors->has('canonical'))
                        <div class="invalid-feedback">
                            {{ $errors->first('canonical') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="" for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="2" style="min-height: auto" class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}">{{ old('meta_description', $blog->meta_description) }}</textarea>
                    @if($errors->has('meta_description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meta_description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="category_id">Category</label>
                    <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                        <option disabled hidden selected> Choose any option </option>
                        @foreach($categories as $id => $category)
                            <option {{ old('category_id', $blog->category_id) == $category->id ? "selected" : "" }} value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('category_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                    <label for="tag">Tags <small>(press <b>Ctrl</b> to select multiple)</small></label>
                    <select name="tags[]" id="tags" class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" multiple="multiple">
                        @foreach ($tags as $key => $tag)
                            <option  {{ (in_array($key, old('tags', [])) || $blog->tags->contains($key)) ? 'selected' : '' }}  value="{{ $tag->id }}" >{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tags'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tags') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label class="required" for="image">Image</label>
                </div>
                <div class="form-group row py-4 bg-dark">
                    <div class="col-lg-6 mx-auto">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill {{ $errors->has('image') ? 'bg-danger' : 'bg-white' }}  shadow-sm">
                            <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light {{ $errors->has('image') ? 'text-white' : 'text-muted' }}">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"><i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted ">Choose file</small></label>
                            </div>
                        </div>
                        @if ($errors->has('image'))
                            <p class="text-danger text-center">{{ $errors->first('image') }}</p>
                        @else
                            <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                        @endif
                        <!-- Uploaded image area-->
                        <div class="image-area mt-4"><img id="imageResult" src="{{ URL('storage/'. $blog->image_path) }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="10" id="editor" name="description">{{ old('description', $blog->description)}}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-check form-switch form-group">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ $blog->is_published ? 'checked' : '' }} />
                    <label class="form-check-label" for="is_published">Publish</label>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <style>
        .ck-editor__editable_inline {
            min-height: 380px;
        }
    </style>
@endsection

@section('scripts')
    <script>
         $(document).ready(function() {
            /*  ==========================================
                SHOW UPLOADED IMAGE
            * ========================================== */
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imageResult')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(function () {
                $('#upload').on('change', function () {
                    readURL(input);
                });
            });
            /*  ==========================================
                SHOW UPLOADED IMAGE NAME
            * ========================================== */
            var input = document.getElementById( 'upload' );
            var infoArea = document.getElementById( 'upload-label' );

            input.addEventListener( 'change', showFileName );
            function showFileName( event ) {
                var input = event.srcElement;
                var fileName = input.files[0].name;
                infoArea.textContent = 'File name: ' + fileName;
            }

            $('#canonical').val('{{ $blog->canonical ?? '' }}');

            $(".get-slug").on("change", function() {
                const slug = $(this).val().toLowerCase()
                            .trim()
                            .replace(/[^\w\s-]/g, '')
                            .replace(/[\s_-]+/g, '-')
                            .replace(/^-+|-+$/g, '');

                $('#slug').val(slug);
                $('#canonical').val('{{ config('app.url') }}' +slug);
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading2' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading2' }
                    ]
                }
            })
            .then( editor => {
                // console.log( editor );
            })
            .catch( error => {
                console.error( error );
        });
    </script>

@endsection
