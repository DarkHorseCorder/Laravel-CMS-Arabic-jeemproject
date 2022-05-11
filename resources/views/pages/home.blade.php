@extends('layouts.web')

@section('title', config('app.name'))
@section('description', '')

@section('canonical', config('app.url'))

@section('content')

    <div class="md:w-[954px] px-[9px] md:px-[15px] rtl:-mt-[14px] rtl:md:mt-0">
        <div class="grid grid-cols-2 gap-y-10 gap-x-8">

            @if( $section_a )
                @php
                    $post_route = route('post.show', [
                        'category' => $section_a->post->categories->first()->getTranslation('slug', $locale),
                        'author'   => $section_a->post->author->getTranslation('slug', $locale),
                        'title'    => $section_a->post->getTranslation('slug', $locale),
                    ]);
                @endphp
                <div class="col-span-2 relative">
                    <a href="{{ $post_route }}" class="pattern-1">
                        <picture>
                            <img class="h-[240px] md:h-[340px] w-full" src="{{ url(config('app.file_base_url') . $section_a->post->image_path ) }}" alt="{{ $section_a->post->getTranslation('title', $locale)  }}">
                        </picture>
                    </a>
                    <div class="absolute top-[2rem] ltr:left-0 rtl:right-0 z-10">
                        <div class="block title text-white  px-1">
                            <h3>
                                <a href="{{ $post_route }}"  class="tags-primary bg-black">
                                    {{ $section_a->post->getTranslation('title', $locale)  }}
                                </a>
                            </h3>
                        </div>
                        <div class="rtl:mt-1 space-x-1">
                            @if ( $section_a->post->categories != null )
                                @foreach ($section_a->post->categories  as $category)
                                    <a href="{{ route('post.index', $category->getTranslation('slug', $locale)) }}"
                                        class="tags-sec text-white p-1" style="background-color:{{$category->getTranslation('color_code', $locale) }}" >
                                        {{ $category->getTranslation('title', $locale) }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="">
                            @if ( $section_a->post->author != null )
                                <a href="{{ route('post.index',  $section_a->post->author->getTranslation('slug', $locale)) }}"
                                    class="tags-sec bg-[#392068] text-white p-1">
                                    {{  $section_a->post->author->getTranslation('title', $locale) }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if( $sections_b )
                @foreach ($sections_b as $section)
                    @php
                        $post_route = route('post.show', [
                            'category' => $section->post->categories->first()->getTranslation('slug', $locale),
                            'author'   => $section->post->author->getTranslation('slug', $locale),
                            'title'    => $section->post->getTranslation('slug', $locale),
                        ]);
                    @endphp
                    <div class="col-span-2 md:col-span-1 relative">
                        <a href="{{ $post_route }}" class="pattern-1">
                            <picture >
                                <img class="" src="{{ url(config('app.file_base_url') . $section->post->image_path ) }}" alt="{{ $section->post->getTranslation('title', $locale)  }}" alt="{{ $section->post->getTranslation('title', $locale)  }}">
                            </picture>
                        </a>
                        <div class="absolute top-[2rem] ltr:left-0 rtl:right-0 z-10">
                            <div class="block title text-white  px-1">
                                <h3>
                                    <a href="{{ $post_route }}"  class="tags-primary bg-black">
                                        {{ $section->post->getTranslation('title', $locale)  }}
                                    </a>
                                </h3>
                            </div>
                            <div class="rtl:mt-1 space-x-1">
                                @if ( $section->post->categories != null )
                                    @foreach ($section->post->categories  as $category)
                                        <a href="{{ route('post.index', $category->getTranslation('slug', $locale)) }}"
                                            class="tags-sec text-white p-1" style="background-color:{{$category->getTranslation('color_code', $locale) }}" >
                                            {{ $category->getTranslation('title', $locale) }}
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="">
                                @if ( $section->post->author != null )
                                    <a href="{{ route('post.index',  $section->post->author->getTranslation('slug', $locale)) }}"
                                        class="tags-sec bg-[#392068] text-white p-1">
                                        {{  $section->post->author->getTranslation('title', $locale) }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @if( $section_c )
                @php
                    $post_route = route('post.show', [
                        'category' => $section->post->categories->first()->getTranslation('slug', $locale),
                        'author'   => $section->post->author->getTranslation('slug', $locale),
                        'title'    => $section->post->getTranslation('slug', $locale),
                    ]);
                @endphp
                <div class="col-span-2 relative">
                    <a href="{{ $post_route }}" class="pattern-1">
                        <picture>
                            <img class="h-[240px] md:h-[340px] w-full" src="{{ url(config('app.file_base_url') . $section_c->post->image_path ) }}" alt="{{ $section_c->post->getTranslation('title', $locale)  }}">
                        </picture>
                    </a>
                    <div class="absolute top-[2rem] ltr:left-0 rtl:right-0 z-10">
                        <div class="block title text-white  px-1">
                            <h3>
                                <a href="{{ $post_route }}"  class="tags-primary bg-black">
                                    {{ $section_c->post->getTranslation('title', $locale)  }}
                                </a>
                            </h3>
                        </div>
                        <div class="rtl:mt-1 space-x-1">
                            @if ( $section_c->post->categories != null )
                                @foreach ($section_c->post->categories  as $category)
                                    <a href="{{ route('post.index', $category->getTranslation('slug', $locale)) }}"
                                        class="tags-sec text-white p-1" style="background-color:{{$category->getTranslation('color_code', $locale) }}" >
                                        {{ $category->getTranslation('title', $locale) }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="">
                            @if ( $section_c->post->author != null )
                                <a href="{{ route('post.index',  $section_c->post->author->getTranslation('slug', $locale)) }}"
                                    class="tags-sec bg-[#392068] text-white p-1">
                                    {{  $section_c->post->author->getTranslation('title', $locale) }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <section class="border-dotted border-y-2 border-black my-10 py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 md:gap-y-0">

                @if( $sections_d )
                    @foreach ($sections_d as $section)
                        @php
                            $post_route = route('post.show', [
                                'category' => $section->post->categories->first()->getTranslation('slug', $locale),
                                'author'   => $section->post->author->getTranslation('slug', $locale),
                                'title'    => $section->post->getTranslation('slug', $locale),
                            ]);
                        @endphp
                        <div class=" pl-1 pr-3 rtl:pl-0 rtl:pr-1 ">
                            <div class="block title text-white pl-1 rtl:pl-0 rtl:pr-1">
                                <h3>
                                    <a href="{{ $post_route }}"  class="tags-primary bg-black">
                                        {{ $section->post->getTranslation('title', $locale)  }}
                                    </a>
                                </h3>
                            </div>

                            <div class="rtl:mt-1 space-x-1">
                                @if ( $section->post->categories != null )
                                    @foreach ($section->post->categories  as $category)
                                        <a href="{{ route('post.index', $category->getTranslation('slug', $locale)) }}"
                                            class="tags-sec text-white p-1" style="background-color:{{$category->getTranslation('color_code', $locale) }}" >
                                            {{ $category->getTranslation('title', $locale) }}
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <div class="">
                                @if ( $section->post->author != null )
                                    <a href="{{ route('post.index',  $section->post->author->getTranslation('slug', $locale)) }}"
                                        class="tags-sec bg-[#392068] text-white p-1">
                                        {{  $section->post->author->getTranslation('title', $locale) }}
                                    </a>
                                @endif
                            </div>
                            <p class="inline-block py-3 text-pri">
                                {{ getFirstParagraph($section->post->body) }}
                            </p>
                        </div>
                    @endforeach
                @endif

            </div>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-4 md:gap-y-0">

             @foreach ($topCategories as $category)
                <div class="space-y-2 rtl:space-y-1">
                    <div>
                        <a href="{{ LaravelLocalization::getLocalizedURL( $locale, route('post.index', $category->getTranslation('slug', $locale ))) }}" class="font-jeem text-xl inline-block bg-primary-six text-white px-4">
                            {{ $category->getTranslation('title', $locale) }}
                        </a>
                    </div>
                    @foreach ($topPosts as $post)
                        @php
                            $post_route = route('post.show', [
                                'category' => $post->categories->first()->getTranslation('slug', $locale),
                                'author'   => $post->author->getTranslation('slug', $locale),
                                'title'    => $post->getTranslation('slug', $locale),
                            ]);
                        @endphp
                        <div class="py-2">
                            <a href="{{ $post_route }}" class="font-jeem text-xl  inline-block border-2 border-black px-2">
                                {{ $post->getTranslation('title', $locale) }}
                            </a>
                        </div>                        
                    @endforeach
                </div>
            @endforeach
            

        </div>

    </div>

@endsection

@section('scripts')

@endsection
