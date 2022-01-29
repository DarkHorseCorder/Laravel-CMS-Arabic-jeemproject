@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="name">Name</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title">Title</label>
                    <input class="get-slug form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="slug">Slug</label>
                    <input class="get-slug form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" >
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="canonical">Canonical</label>
                    <input class="form-control {{ $errors->has('canonical') ? 'is-invalid' : '' }}" type="url" readonly name="canonical" id="canonical" value="{{ old('canonical', '') }}" >
                    @if($errors->has('canonical'))
                        <div class="invalid-feedback">
                            {{ $errors->first('canonical') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="meta_description">Meta Description</label>
                    <textarea name="meta_description" style="min-height: auto" id="meta_description" rows="2" class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}">{{ old('meta_description', '') }}</textarea>
                    @if($errors->has('meta_description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meta_description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="body">Body</label>
                    <textarea class="ckeditor form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="10" id="editor" name="body">{{ old('body') }}</textarea>
                    @if($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>

                <div class="form-check form-switch form-group">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" checked/>
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
            $(".get-slug").on("change", function() {
                const slug = $(this).val().toLowerCase()
                            .trim()
                            .replace(/[^\w\s-]/g, '')
                            .replace(/[\s_-]+/g, '-')
                            .replace(/^-+|-+$/g, '');

                $('#slug').val(slug);
                $('#canonical').val( '{{ config('app.url') }}' +slug);
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
