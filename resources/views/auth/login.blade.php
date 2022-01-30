@extends('layouts.web')

@section('title', 'Login')
@section('description', '')
@section('canonical', config('app.url') . Request::path())


@section('content')
    <div class="w-full bg-none lg:bg-hero bg-no-repeat bg-top bg-cover">
        <div class="container mx-auto lg:px-4 py-6">
            <div class="flex flex-col space-y-4 my-2 md:my-0 lg:flex-row lg:mx-4">

                <div class="panel w-full md:w-1/2 xl:w-[50%] mx-auto ">
                    <form action="{{ route('login') }}" method="POST" class="mx-2 border-4 border-dotted border-black  shadow-md rounded-lg flex flex-col space-y-4 py-16 px-10">
                        @csrf

                        <div class="text-3xl text-center font-semibold">
                            @lang('translation.login')
                        </div>

                        @if (session('success') )
                            <div class="mt-3 bg-primary-one border-t-4 border-primary-two rounded text-teal-900 shadow-md" role="alert">
                                <div class="py-2">
                                        <p class="text-center  font-bold">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="mb-2">
                            <input id="email" type="email"
                                class="w-full input-control @error('email') error-field @enderror" required
                                autocomplete="email" autofocus placeholder="@lang('translation.email')" name="email"
                                value="{{ old('email', null) }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-red-400">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="">
                            <input id="password" type="password"
                                class="w-full input-control @error('password') error-field @enderror" required
                                autocomplete="password" autofocus placeholder="@lang('translation.password')"
                                name="password" value="{{ old('password', null) }}">
                            @error('password')
                                <div class="invalid-feedback">Please enter your password!</div>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class=" bg-primary-two text-white p-1 inline">
                            @lang('translation.login')
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
