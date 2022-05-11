
@extends('layouts.web')

@section('title', $meta['title'][$locale] . ' | ' . config('app.name'))
@section('description', '')

@section('canonical', config('app.url'))

@section('content')

    <!-- Main Content -->
    <div class="md:w-[954px] px-2 md:px-[15px] md:mt-3 ">

        <h1 class="bg-black text-white text-lg pl-1 py-1 -mt-3 md:text-4xl md:pl-3 md:py-3">
            {{ $meta['title'][$locale]  }}
        </h1>

        <div class="page-section mt-6 mb-10 md:my-12 border-b-[1px] border-dotted border-black">
            {!! $page->getTranslation('body', $locale) !!}
            @if ( in_array('contact-us', $meta['slug']) || in_array('اتصلي-بنا', $meta['slug']) )  
                <form class="space-y-4 mt-10 px-4 py-7 md:py-8 border-[1px] border-dotted border-black">

                    <div class="w-full">
                        <label for="name">@lang('translation.name') <strong class="text-red-500 text-sm">*</strong></label>
                        <input type="text" name="name" class="form-input" placeholder="" value="">
                    </div>

                    <div class="w-full">
                        <label for="email">@lang('translation.email') <strong class="text-red-500 text-sm">*</strong></label>
                        <input type="text" name="email" class="form-input" placeholder="" value="">
                    </div>

                    <div class="w-full md:col-span-2">
                        <label for="message">@lang('translation.message') <strong class="text-red-500 text-sm">*</strong></label>
                        <textarea name="detail" rows="2" class=" form-input h-28" placeholder=""></textarea>
                    </div>

                    <div class="text-right mt-2">
                        <a href="#" class="border border-[#666] text-[#666] text-sm rounded px-4 py-1">
                            <span>@lang('translation.add')</span>
                        </a>
                    </div>

                </form>
            @endif
        </div>

    </div>

@endsection

@section('scripts')
@endsection
