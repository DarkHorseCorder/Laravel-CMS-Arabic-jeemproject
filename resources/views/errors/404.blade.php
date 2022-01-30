
@extends('layouts.web')

@section('title', 'JEEM')
@section('description', '')

@section('canonical', config('app.url'))

@section('content')

    <!-- Main Content -->
    <div class="md:w-[954px] px-2 md:px-[15px] md:mt-3">
        <h1 class="bg-black text-white text-lg pl-1 py-1 -mt-3 md:text-4xl md:pl-3 md:py-3">
            @lang('translation.not-found')
        </h1>
    </div>

@endsection

@section('scripts')
@endsection
