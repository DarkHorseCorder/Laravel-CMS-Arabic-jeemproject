@extends('layouts.admin')

@section('styles')
    <style>
        .ck-editor__editable {
            min-height: 350px;
        }
    </style>
@endsection
@section('content')

    @include('partials.backend.admin-breadcrum')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.pages.store") }}" enctype="multipart/form-data">
                @csrf

                @foreach(config('translatable.locales') as $locale)
                    <div class="border p-3 my-2">
                        <div class="form-group">
                            <label class="required" for="title_{{ $locale }}">Title ({{ strtoupper($locale) }}) </label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title[{{ $locale }}]" id="title_{{ $locale }}" value="{{ old('title.'.$locale, '') }}" >

                            @if($errors->has('title.*'))
                                <p class="text-danger">{{ $errors->first('title.'.$locale) }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="body_{{ $locale }}"> Body ({{ strtoupper($locale) }}) </label>
                            <textarea rows="" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body[{{ $locale }}]" id="body_{{ $locale }}">{{ old('body.'.$locale, '') }}</textarea>

                            @if($errors->has('body.*'))
                                <p class="text-danger">{{ $errors->first('body.'.$locale) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/translations/ar.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/translations/de.js"></script>
    <script>

    @foreach(config('translatable.locales') as $locale)

        ClassicEditor
            .create( document.querySelector( '#body_{{ $locale }}' ), {
                language: '{{ $locale }}',
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

    @endforeach
    </script>
@endsection
