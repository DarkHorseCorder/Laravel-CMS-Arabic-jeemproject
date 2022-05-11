@extends('layouts.web')

@section('title', $post->getTranslation('title', $locale))
@section('description', '')

@section('canonical', config('app.url'))

@section('content')

    <!-- Main -->
    <div class="px-2 -mt-3 md:w-[954px] md:px-[15px] md:mt-1">
        <div class="border-dotted border-b-[1px] border-black pb-10">

            <div class="col-span-2">

                <picture>
                    <img class="w-full object-cover max-h-[30rem]" src="{{ url(config('app.file_base_url') . $post->image_path) }}" alt="{{ $post->title }}">
                </picture>

                <div class="">
                    <div class=" text-white px-1 ">
                        <h3>
                            <a class="main-heading bg-black" style="word-spacing: -5px">
                                {{ $post->getTranslation('title', $locale) }}
                            </a>
                        </h3>
                    </div>

                    <div class=" space-x-1 ">
                        {{-- {{ dd($post->post) }} --}}
                        @foreach ($post->categories as $category)
                            <a href="{{ route('post.index', $category->getTranslation('slug', $locale)) }}"
                                style="background-color: {{ $category->getTranslation('color_code', $locale) }}"
                                class="tags-sec  text-white p-1">
                                {{ $category->getTranslation('title', $locale) }} </a>
                        @endforeach
                    </div>
                    <div class="my-4">
                        <a href="{{ route('post.index', $post->author->getTranslation('slug', $locale)) }}"
                            class="bg-primary-two p-1">
                            {{ $post->author->getTranslation('title', $locale) }}
                        </a>
                    </div>
                    <div class="my-4">
                        <a class=" bg-primary-one p-1">
                            {{ $post->created_at->format('m/d/Y') }}
                        </a>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:space-x-12 space-y-8 md:space-y-0">

                    <div class="text-[#817f7f] font-semibold md:w-[20%]" style="word-spacing: 9px;">

                        <h3 class="px-1 pb-3">
                            {{ getWordCount($post->getTranslation('body', $locale)) }} @lang('translation.words')
                        </h3>
                        <hr class="border border-[#817f7f] my-1">

                        <a class="px-1">Tunisia</a>

                    </div>

                    <div class="space-y-4 px-3 md:w-[80%]">

                        <style>
                            .post-body >  p{
                                /* font-family: 'Symbio','sans-serif';
                                margin-bottom: 1rem;
                                font-size: inherit;
                                line-height: 1.3;
                                text-rendering: optimizeLegibility; */
                            }
                            .post-body > h2 {
                                display : none;
                            }
                        </style>
                        <div class="post-body">
                            {!! $post->getTranslation('body', $locale) !!}
                        </div>

                        <div class="flex space-x-2 text-xs md:text-base">

                            @foreach ($post->tags as $tag)
                                <a class="block border-2 border-black px-3 py-2"
                                    href="{{ route('post.index', $tag->getTranslation('slug', $locale)) }}">
                                    {{ $tag->getTranslation('title', $locale) }}
                                </a>
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>

            <ul class=" mt-8 md:mt-4 flex space-x-2 text-2xl ">
                <li><a href="{{ $post->author->facebook_link }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="{{ $post->author->twitter_link }}"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="{{ $post->author->whatsapp_link }}"><i class="fa-brands fa-whatsapp"></i></a></li>
            </ul>

        </div>

        <section class="border-dotted border-y-[1px] border-black mt-2 mb-4 py-4 ">

            <div class="space-y-4">

                <a href="{{ route('post.index', $post->author->getTranslation('slug', $locale)) }}"
                    class="text-primary-six font-semibold text-3xl" style="word-spacing: 8px;">
                    {{ $post->author->getTranslation('title', $locale) }}
                </a>

                <p class="text-xl">
                    {{ $post->author->getTranslation('info', $locale) }}
                </p>
            </div>

        </section>

        <div class="grid grid-cols-2 gap-y-10 gap-x-8">
            @foreach ($related as $item)
                <div class="col-span-2 md:col-span-1 ">

                    <div class="relative">
                        <a href="{{ $item->slug }}" class=" pattern-1">
                            <picture>
                                <img class="md:h-[18rem]" src="{{ url(config('app.file_base_url') . $item->image_path) }}"
                                    alt="{{ $post->title }}" />
                            </picture>
                        </a>
                    </div>
                    <div class="">
                        <div class="block title text-white px-1">
                            <h3>
                                <a href="{{ $item->slug }}" class="rel-post bg-black">{{ $item->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <section>
            @if (session('success'))
                <p class="bg-green-200 px-2 py-4">@lang('translation.comment-msg') </p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ \LaravelLocalization::localizeURL(route('comments.store')) }} " method="POST"
                class="space-y-4 mt-10 px-4 py-7 md:py-8 border-[1px] border-dotted border-black">
                @csrf
                <input type="hidden" name="post_id" value="{{ old('post_id', $post->id) }}">

                <div class="w-full">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-input @error('name') form-input-danger @enderror" placeholder="@lang('translation.name')">
                </div>

                <div class="w-full">
                    <input type="text" name="email" value="{{ old('email') }}"
                        class="form-input  @error('name') form-input-danger @enderror" placeholder="@lang('translation.email')">
                    <p class="text-xs my-1">@lang('translation.email-msg')</p>
                </div>

                <div class="w-full">
                    <textarea name="comment" rows="2" class=" form-input  @error('name') form-input-danger @enderror h-28"
                        placeholder="@lang('translation.comment')">{{ old('comment') }}</textarea>
                </div>


                <div class="field-type-entityreference field-name-field-avatar field-widget-options-buttons form-wrapper"
                    id="edit-field-avatar">
                    <div class="form-item form-type-radios form-item-field-avatar-und">
                        <label for="edit-field-avatar-und">Avatar </label>
                        <div id="edit-field-avatar-und" class="form-radios  rtl:space-x-reverse">
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-none" name="avatar_id" value="e" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-none">@lang('translation.n-a')</label>
                            </div>
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-40" name="avatar_id" value="1" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-40">
                                    <span class="views-field views-field-field-image">
                                        <span class="field-content">
                                            <img typeof="Image" src="{{ asset('imgs/avatar1.png') }}" width="100"
                                                height="100" alt="">
                                        </span>
                                    </span>
                                </label>

                            </div>
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-39" name="avatar_id" value="2" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-39">
                                    <span class="views-field views-field-field-image">
                                        <span class="field-content">
                                            <img typeof="Image" src="{{ asset('imgs/avatar2.png') }}" width="100"
                                                height="100" alt="">
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-41" name="avatar_id" value="3" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-41">
                                    <span class="views-field views-field-field-image">
                                        <span class="field-content">
                                            <img typeof="Image" src="{{ asset('imgs/avatar3.png') }}" width="100"
                                                height="100" alt="">
                                        </span>
                                    </span>
                                </label>

                            </div>
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-42" name="avatar_id" value="4" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-42">
                                    <span class="views-field views-field-field-image">
                                        <span class="field-content">
                                            <img typeof="Image" src="{{ asset('imgs/avatar4.png') }}" width="100"
                                                height="100" alt="">
                                        </span>
                                    </span>
                                </label>

                            </div>
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-43" name="avatar_id" value="5" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-43">
                                    <span class="views-field views-field-field-image">
                                        <span class="field-content">
                                            <img typeof="Image" src="{{ asset('imgs/avatar5.png') }}" width="100"
                                                height="100" alt="">
                                        </span>
                                    </span>
                                </label>

                            </div>
                            <div class="form-item form-type-radio form-item-field-avatar-und">
                                <input type="radio" id="edit-field-avatar-und-44" name="avatar_id" value="6" class="form-radio">
                                <label class="option" for="edit-field-avatar-und-44">
                                    <span class="views-field views-field-field-image">
                                        <span class="field-content">
                                            <img typeof="Image" src="{{ asset('imgs/avatar6.png') }}" width="100" height="100" alt="">
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div  class="g-recaptcha overflow-hidden" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>

                <div class="text-right mt-2">
                    <button class="border border-[#666] text-[#666] text-sm rounded px-4 py-1">
                        <span>@lang('translation.save')</span>
                    </button>
                </div>
            </form>
        </section>

    </div>

@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
