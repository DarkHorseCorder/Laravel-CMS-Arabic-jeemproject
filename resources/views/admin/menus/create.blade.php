@extends('layouts.admin')

@section('styles')

@endsection
@section('content')

    @include('partials.backend.admin-breadcrum')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.menus.store") }}" enctype="multipart/form-data">
                @csrf

                @foreach(config('translatable.locales') as $locale)

                    <div class="form-group">
                        <label class="required" for="title_{{ $locale }}">Title ({{ strtoupper($locale) }}) </label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="{{ $locale }}[title]" id="title_{{ $locale }}" value="{{ old($locale . '.title', '') }}" >

                        @if($errors->has('*.title'))
                            <p class="text-danger">{{ $errors->first($locale.'.title') }}</p>
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
@endsection

@section('scripts')
@endsection
