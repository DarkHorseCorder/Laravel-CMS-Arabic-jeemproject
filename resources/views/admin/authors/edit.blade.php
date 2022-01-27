@extends('layouts.admin')

@section('styles')

@endsection
@section('content')

    @include('partials.backend.admin-breadcrum')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.authors.update", $author->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @foreach(config('translatable.locales') as $locale)
                    <div class="form-group">
                        <label class="required" for="title_{{ $locale }}">Name ({{ strtoupper($locale) }}) </label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title[{{ $locale }}]" id="title_{{ $locale }}" value="{{ old($locale . '.title', $author->getTranslation('title', $locale)) }}" >

                        @if($errors->has('*.title'))
                            <p class="text-danger">{{ $errors->first($locale.'.title') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="required" for="info_{{ $locale }}">Info ({{ strtoupper($locale) }}) </label>
                        <textarea rows="2" class="form-control {{ $errors->has('info') ? 'is-invalid' : '' }}" name="info[{{ $locale }}]" id="info_{{ $locale }}">{{ old($locale . '.info', $author->getTranslation('info', $locale)) }}</textarea>

                        @if($errors->has('*.info'))
                            <p class="text-danger">{{ $errors->first($locale.'.info') }}</p>
                        @endif
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
                $('#canonical').val('{{ config('app.url') }}' +slug);
            });

        });
    </script>
@endsection
