@extends('layouts.web')

@section('title', 'Search')
@section('description', '')
@section('canonical', config('app.url') . Request::path())

@section('content')

    <!-- Main -->
    <div class="md:w-[954px] px-[15px] ">

        <h1 class="bg-black text-white text-lg pl-1 px-2 py-1 -mt-3 md:text-4xl md:pl-3 md:py-3 [word-spacing:13px]">Search
        </h1>

        <form action="{{ route('search') }}" method="GET">
            <div class=" border-b border-t border-dotted border-black py-5 mt-3 md:mt-12 md:mb-4">
                <input placeholder="Search" type="text" id="edit-k" name="k" value="{{ old('k', $search) }}"
                    size="30" maxlength="128" class="form-text px-4"
                    style=" width: 100%; background-color: transparent; border: 1px solid; border-radius: 20px; padding-left: 9px;">
            </div>
        </form>
        <style>
            .post-body {
                font-family: 'Symbio', 'sans-serif';
                font-weight: 400;
                margin-bottom: 1rem;
                font-size: inherit;
                line-height: 1.3;
                text-rendering: optimizeLegibility;
            }
        </style>
        @if (!empty($posts))
            @foreach ($posts as $post)
                <div class="flex flex-col md:flex-row md:space-x-8 pr-4">
                    <div class="md:w-1/4 text-right">
                        @if ($post->categories)
                            <div class="">
                                @foreach ($post->categories as $category)
                                    <a href="{{ route('post.index', $category->getTranslation('slug', $locale)) }}"
                                        class="tags-sec text-white p-1 mx-1"
                                        style="background-color: {{ $category->getTranslation('color_code', $locale) }}">
                                        {{ $category->getTranslation('title', $locale) }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <div class="my-3">
                            <a class=" bg-primary-one p-1 text-sm font-semibold mx-1">
                                {{ showDate($post->created_at) }}
                            </a>
                        </div>
                    </div>

                    <div class="md:w-3/4 mb-4 ml-2 md:mt-3">
                        <a
                            href="{{ route('post.show', ['category' => $post->categories[0]->getTranslation('slug', $locale), 'author' => $post->author->getTranslation('slug', $locale), 'title' => $post->getTranslation('slug', $locale)]) }}">
                            <h3 class="text-lg">
                                {{ $post->getTranslation('title', $locale) }}
                            </h3>
                        </a>
                        <p class="text-xs post-body">
                            {{ getFirstParagraph($post->getTranslation('body', $locale)) }}
                        <p>
                        <div class="border-b border-dotted border-black ml-20 md:ml-0 mt-2 md:mt-6 text-center">
                            <a
                                href="{{ route('post.show', ['category' => $post->categories[0]->getTranslation('slug', $locale), 'author' => $post->author->getTranslation('slug', $locale), 'title' => $post->getTranslation('slug', $locale)]) }}"><i
                                    class="fa-solid fa-chevron-down text-2xl"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif       

        {{-- <div class="border-t-2 border-b-2 border-dotted border-black py-1 mt-3 md:mx-4">
            <p class="font-semibold text-center text-sm">Load More</p>
        </div> --}}

    </div>

    <div class="md:w-[160px] px-3 mt-8 mb-4 md:px-[15px] md:mt-32">

        <details class="relative cursor-pointer">
            <summary class="border-t-4 border-b-2 border-black py-1 font-semibold">
                @lang('translation.language')
            </summary>
            <div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
            </div>
        </details>

        <details class="relative cursor-pointer">
            <summary class="border-y-2  border-black py-1 font-semibold">
                @lang('translation.sections')
            </summary>
            <div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
            </div>
        </details>

        <details class="relative cursor-pointer">
            <summary class="border-y-2  border-black py-1 font-semibold">
                @lang('translation.formats')
            </summary>
            <div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
            </div>
        </details>
        <details class="relative cursor-pointer">
            <summary class="border-y-2  border-black py-1 font-semibold">
                @lang('translation.locations')
            </summary>
            <div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
            </div>
        </details>
        <details class="relative cursor-pointer">
            <summary class="border-y-2  border-black py-1 font-semibold">
                @lang('translation.authors')
            </summary>
            <div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
            </div>
        </details>
        <details class="relative cursor-pointer">
            <summary class="border-t-2 border-b-4 border-black py-1 font-semibold">
                @lang('translation.tags')
            </summary>
            <div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
                <div class="border-2 border-b-black border-dotted"> English (5)</div>
            </div>
        </details>

    </div>

@endsection
