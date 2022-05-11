@extends('layouts.web')

@section('title', 'JEEM')
@section('description', '')

@section('canonical', config('app.url'))

@section('styles')
    <style>
        .menu {
            padding: 0;
            margin: 0;
            list-style: none;
            position: relative;
            color: #000;
            font-size: 1.1em;
            /* line-height: 1;
                text-decoration: none;
                display: block; */
        }

        .menu li.first {
            padding-top: 1px;
        }

        .menu li.last {
            padding-bottom: 1px;
        }

        .menu li.first a {
            /* padding: 0.2em 0; */
            border-top: 1px dotted;
        }

        .menu li.last a {
            /* padding: 0.2em 0; */
            border-bottom: 1px dotted;
        }

        .menu li a {
            padding: 0.8em 0;
            line-height: 1;
            text-decoration: none;
            display: block;
            font-family: Symbio, sans-serif;
        }

        .menu li {
            font-size: 0.8em;
            border-top: 1px dotted;
            border-bottom: 1px dotted;
            margin: 0;
        }

        .menu li.dossiers a {
            font-size: 1.1em;
        }
    </style>
@endsection

@section('content')

    <div class="mx-auto max-w-[1039px] mt-[50px]">
        <div class="flex w-full">
            <aside class="w-[85px] pr-[15px]">
                <a href="#" class="w-[70px] h-[125px]  pr-[15px]">
                    <img class="w-[70] pb-2" src="{{ asset('imgs/logo.png') }}" alt="">
                    <img class="w-[70px] py-[7px]" src="{{ asset('imgs/sitename.png') }}" alt="">
                </a>

                <div class="">
                    <ul class="menu">
                        <li class="first leaf">
                            <a class="hover:text-pink" href="#"> {{__('translation.title')}}  </a>
                        </li>
                        <li class="leaf">
                            <a class="hover:text-pink" href="#">Authority</a>
                        </li>
                        <li class="leaf">
                            <a class="hover:text-pink" href="#">Culture</a>
                        </li>
                        <li class="leaf">
                            <a class="hover:text-pink" href="#">Bodies</a>
                        </li>
                        <li class="leaf">
                            <a class="hover:text-pink" href="#">Gender & Sexuality</a>
                        </li>
                        <li class="leaf">
                            <a class="hover:text-pink" href="#">Internet</a>
                        </li>
                        <li class="leaf last">
                            <a class="hover:text-pink" href="#">Love</a>
                        </li>
                        <li class="last leaf dossiers">
                            <a class="hover:text-pink" href="#">Dossiers</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="menu-block-wrapper menu-block-5 menu-name-menu-formats parent-mlid-0 menu-level-1">
                        <ul class="menu">
                            <li class="first leaf menu-mlid-728"><a href="/en/articles">Articles</a></li>
                            <li class="leaf menu-mlid-725"><a href="/en/taxonomy/term/13">Audios</a></li>
                            <li class="leaf menu-mlid-729"><a href="/en/illustration">Illustrations</a></li>
                            <li class="leaf menu-mlid-726"><a href="/en/images">Images</a></li>
                            <li class="last leaf menu-mlid-727"><a href="/en/taxonomy/term/12">Videos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="relative rounded-xl overflow-auto p-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-10 max-w-lg mx-auto">
                      <div dir="ltr">
                        <p class="mb-4 text-sm font-medium text-slate-500 dark:text-slate-400">Left-to-right</p>
                        <div class="group flex items-center">
                          <img class="shrink-0 h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                          <div class="ml-3 rtl:ml-0 rtl:mr-3">
                            <p class="text-sm font-medium text-slate-700 group-hover:text-slate-900 dark:text-slate-300 dark:group-hover:text-white">Tom Cook</p>
                            <p class="text-sm font-medium text-slate-500 group-hover:text-slate-700 dark:group-hover:text-slate-300">Director of Operations</p>
                          </div>
                        </div>
                      </div>
                      <div dir="rtl">
                        <p class="mb-4 text-sm font-medium text-slate-500 dark:text-slate-400">Right-to-left</p>
                        <div class="group flex items-center">
                          <img class="shrink-0 h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1563833717765-00462801314e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                          <div class="ml-3 rtl:ml-0 rtl:mr-3">
                            <p class="text-sm font-medium text-slate-700 group-hover:text-slate-900 dark:text-slate-300 dark:group-hover:text-white">تامر كرم</p>
                            <p class="text-sm font-medium text-slate-500 group-hover:text-slate-700 dark:group-hover:text-slate-300">الرئيس التنفيذي</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <div>
                    Langauge :

                    <select onchange="changeLanguage(this.value)">
                        @foreach (config('translatable.locales') as $locale)
                            <option {{session()->has('lang_code')?(session()->get('lang_code')== $locale ?'selected':''):''}} value="{{ $locale }}">{{ $locale }}</option>
                        @endforeach
                    </select>

                </div>
            </aside>
            <div class="w-[954px] px-[15px] ">
                <div class="grid grid-cols-2 gap-y-10 gap-x-8">
                    <div class="col-span-2">

                        {{-- @foreach($posts as $post)
                            <div>
                                <h2 class="text-xl">{{ $post->title }}</h2>
                                <p class="mt-2">{{ substr($post->full_text, 0, 50) }}...</p>
                            </div>
                        @endforeach --}}

                        <a href="#" class="relative pattern-1">
                            <picture >
                                <img class="" src="{{ asset('imgs/blogs/feminist_archive-sana_tannoury-karam.jpg') }}" alt="A">
                            </picture>
                            <div class="absolute top-[2rem] left-0 z-10">
                                <div class="block title bg-black text-white py-1 px-1">
                                    <h3>Reimagining the Archival Body: Towards a Feminist Approach to the Archive</h3>
                                </div>
                                <div class="pt-1 space-x-1">
                                    {{-- <a href="#" class=" bg-pink text-white p-1"> Authority </a> --}}
                                    <span class=" bg-pink text-white p-1"> Authority </span>
                                    <span class="bg-orange text-white p-1"> Gender & Sexuality </span>
                                </div>
                                <div class="pt-1">
                                    <span class="bg-purple text-white p-1"> Sana Tannoury-Karam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="">
                        <a href="#" class="relative pattern-1">
                            <picture >
                                <img class="" src="{{ asset('imgs/blogs/alternative_history_to_aids-ahmed_awadallah.jpg') }}" alt="A">
                            </picture>
                            <div class="absolute top-[2rem] left-0 z-10">
                                <div class="block title bg-black text-white py-1 px-1">
                                    <h3>Reimagining the Archival Body: Towards a Feminist Approach to the Archive</h3>
                                </div>
                                <div class="pt-1 space-x-1">
                                    {{-- <a href="#" class=" bg-pink text-white p-1"> Authority </a> --}}
                                    <span class=" bg-pink text-white p-1"> Authority </span>
                                    <span class="bg-orange text-white p-1"> Gender & Sexuality </span>
                                </div>
                                <div class="pt-1">
                                    <span class="bg-purple text-white p-1"> Sana Tannoury-Karam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="">
                        <a href="#" class="relative pattern-1">
                            <picture >
                                <img class="" src="{{ asset('imgs/blogs/hate_speech-lgbtq-social_media-afef_abrougui.jpg') }}" alt="A">
                            </picture>
                            <div class="absolute top-[2rem] left-0 z-10">
                                <div class="block title bg-black text-white py-1 px-1">
                                    <h3>Reimagining the Archival Body: Towards a Feminist Approach to the Archive</h3>
                                </div>
                                <div class="pt-1 space-x-1">
                                    {{-- <a href="#" class=" bg-pink text-white p-1"> Authority </a> --}}
                                    <span class=" bg-pink text-white p-1"> Authority </span>
                                    <span class="bg-orange text-white p-1"> Gender & Sexuality </span>
                                </div>
                                <div class="pt-1">
                                    <span class="bg-purple text-white p-1"> Sana Tannoury-Karam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-span-2">
                        <a href="#" class="relative pattern-1">
                            <picture >
                                <img class="" src="{{ asset('imgs/blogs/body-memory-shame-rasha-younes.jpg') }}" alt="A">
                            </picture>
                            <div class="absolute top-[2rem] left-0 z-10">
                                <div class="block title bg-black text-white py-1 px-1">
                                    <h3>Reimagining the Archival Body: Towards a Feminist Approach to the Archive</h3>
                                </div>
                                <div class="pt-1 space-x-1">
                                    {{-- <a href="#" class=" bg-pink text-white p-1"> Authority </a> --}}
                                    <span class=" bg-pink text-white p-1"> Authority </span>
                                    <span class="bg-orange text-white p-1"> Gender & Sexuality </span>
                                </div>
                                <div class="pt-1">
                                    <span class="bg-purple text-white p-1"> Sana Tannoury-Karam</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <section class="border-dotted border-y-2 border-black my-10 py-10">
                    <div class="grid grid-cols-3 gap-x-6">
                        <div class="space-y-2">
                            <div>
                                <a href="#" class="inline-block bg-pink text-white py-1 px-2">Culture</a>
                            </div>
                            <div class="py-2">
                                <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                    Film review: ‘The Wife of an Important Man’— Was Mohamed Khan a feminist?
                                </a>
                            </div>
                            <div class="py-2">
                                <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                    Love in the time of defeats
                                </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <a href="#" class="inline-block bg-pink text-white py-1 px-2">Culture</a>
                            </div>
                            <div class="py-2">
                                <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                    Film review: ‘The Wife of an Important Man’— Was Mohamed Khan a feminist?
                                </a>
                            </div>
                            <div class="py-2">
                                <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                    Love in the time of defeats
                                </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <a href="#" class="inline-block bg-pink text-white py-1 px-2">Culture</a>
                            </div>
                            <div class="py-2">
                                <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                    Film review: ‘The Wife of an Important Man’— Was Mohamed Khan a feminist?
                                </a>
                            </div>
                            <div class="py-2">
                                <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                    Love in the time of defeats
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="grid grid-cols-3 gap-x-6">
                    <div class="space-y-2">
                        <div>
                            <a href="#" class="inline-block bg-pink text-white py-1 px-2">Culture</a>
                        </div>
                        <div class="py-2">
                            <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                Film review: ‘The Wife of an Important Man’— Was Mohamed Khan a feminist?
                            </a>
                        </div>
                        <div class="py-2">
                            <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                Love in the time of defeats
                            </a>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <a href="#" class="inline-block bg-pink text-white py-1 px-2">Culture</a>
                        </div>
                        <div class="py-2">
                            <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                Film review: ‘The Wife of an Important Man’— Was Mohamed Khan a feminist?
                            </a>
                        </div>
                        <div class="py-2">
                            <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                Love in the time of defeats
                            </a>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <a href="#" class="inline-block bg-pink text-white py-1 px-2">Culture</a>
                        </div>
                        <div class="py-2">
                            <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                Film review: ‘The Wife of an Important Man’— Was Mohamed Khan a feminist?
                            </a>
                        </div>
                        <div class="py-2">
                            <a href="#" class="inline-block border-2 border-black px-2 py-1">
                                Love in the time of defeats
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer class="border-t-4 border-black mt-[56px] ">
            <div class="flex">
                <div class="w-[85px] pr-[15px] mt-[53px]">
                    <a href="#" class="w-[85px] h-[125px]  pr-[15px]">
                        <img class="w-[70px] pb-2" src="{{ asset('imgs/logo.png') }}" alt="">
                        <img class="w-[70px] py-[7px]" src="{{ asset('imgs/sitename.png') }}" alt="">
                    </a>
                </div>
                <div class="w-full">
                    <div class="grid grid-cols-5 gap-x-8 pt-5">
                        <div class="col-span-1"> </div>
                        <div class="col-span-2">
                            <h4 class="text-xl pb-2 font-semibold">Sections</h4>
                        </div>
                        <div class="col-span-1"> </div>
                        <div class="col-span-1"> </div>
                    </div>
                    <div class="grid grid-cols-5 gap-x-8">
                        <div class="col-span-1">
                            <div class="border-t-4 border-black mx-4">
                                <ul class="my-10">
                                    <li><a href="/en/articles">Articles</a></li>
                                    <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                    <li><a href="/en/illustration">Illustrations</a></li>
                                    <li><a href="/en/images">Images</a></li>
                                    <li><a href="/en/taxonomy/term/12">Videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="border-t-4 border-black">
                                <div class="flex justify-between">

                                    <div class="space-y-1">
                                        <a href="#" class="block border-b-[1px] border-black">Articles</a>
                                        <a href="#" class="block border-b-[1px] border-black">Articles</a>
                                    </div>

                                    <ul class="hidden">
                                        <li class="border-b-[1px] border-black"><a href="/en/articles">Articles</a></li>
                                        <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                        <li><a href="/en/illustration">Illustrations</a></li>
                                        <li><a href="/en/images">Images</a></li>
                                        <li><a href="/en/taxonomy/term/12">Videos</a></li>
                                    </ul>
                                    <ul class="">
                                        <li><a href="/en/articles">Articles</a></li>
                                        <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                        <li><a href="/en/illustration">Illustrations</a></li>
                                        <li><a href="/en/images">Images</a></li>
                                        <li><a href="/en/taxonomy/term/12">Videos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="border-t-4 border-black">
                                <ul class="">
                                    <li><a href="/en/articles">Articles</a></li>
                                    <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                    <li><a href="/en/illustration">Illustrations</a></li>
                                    <li><a href="/en/images">Images</a></li>
                                    <li><a href="/en/taxonomy/term/12">Videos</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="border-t-4 border-black">
                                <ul class="">
                                    <li><a href="/en/articles">Articles</a></li>
                                    <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                    <li><a href="/en/illustration">Illustrations</a></li>
                                    <li><a href="/en/images">Images</a></li>
                                    <li><a href="/en/taxonomy/term/12">Videos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden  grid grid-cols-6 gap-x-6 pt-5">
                <div class="col-span-1"> </div>
                <div class="col-span-1"> </div>
                <div class="col-span-2">
                    <h4 class="text-xl pb-2 font-semibold">Sections</h4>
                </div>
                <div class="col-span-1"> </div>
                <div class="col-span-1"> </div>
            </div>
            <div class="hidden grid grid-cols-6 gap-x-6">
                <div class="col-span-1">
                    <div class="w-[85px] pr-[15px]">
                        <a href="#" class="w-[70px] h-[125px]  pr-[15px]">
                            <img class="w-[70] pb-2" src="{{ asset('imgs/logo.png') }}" alt="">
                            <img class="w-[70px] py-[7px]" src="{{ asset('imgs/sitename.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="border-t-4 border-black">
                        <ul>
                            <li><a href="/en/articles">Articles</a></li>
                            <li><a href="/en/taxonomy/term/13">Audios</a></li>
                            <li><a href="/en/illustration">Illustrations</a></li>
                            <li><a href="/en/images">Images</a></li>
                            <li><a href="/en/taxonomy/term/12">Videos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="border-t-4 border-black">
                        <div class="flex justify-between">

                            <div class="space-y-1">
                                <a href="#" class="block border-b-[1px] border-black">Articles</a>
                                <a href="#" class="block border-b-[1px] border-black">Articles</a>
                            </div>

                            <ul class="hidden">
                                <li class="border-b-[1px] border-black"><a href="/en/articles">Articles</a></li>
                                <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                <li><a href="/en/illustration">Illustrations</a></li>
                                <li><a href="/en/images">Images</a></li>
                                <li><a href="/en/taxonomy/term/12">Videos</a></li>
                            </ul>
                            <ul class="">
                                <li><a href="/en/articles">Articles</a></li>
                                <li><a href="/en/taxonomy/term/13">Audios</a></li>
                                <li><a href="/en/illustration">Illustrations</a></li>
                                <li><a href="/en/images">Images</a></li>
                                <li><a href="/en/taxonomy/term/12">Videos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="border-t-4 border-black">
                        <ul class="">
                            <li><a href="/en/articles">Articles</a></li>
                            <li><a href="/en/taxonomy/term/13">Audios</a></li>
                            <li><a href="/en/illustration">Illustrations</a></li>
                            <li><a href="/en/images">Images</a></li>
                            <li><a href="/en/taxonomy/term/12">Videos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="border-t-4 border-black">
                        <ul class="">
                            <li><a href="/en/articles">Articles</a></li>
                            <li><a href="/en/taxonomy/term/13">Audios</a></li>
                            <li><a href="/en/illustration">Illustrations</a></li>
                            <li><a href="/en/images">Images</a></li>
                            <li><a href="/en/taxonomy/term/12">Videos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        function changeLanguage(lang){
            window.location='{{url("change-language")}}/'+lang;
            console.log('first')
        }
    </script>

@endsection

@section('scripts')
    <script>
        function changeLanguage(lang){
            window.location='{{url("change-language")}}/'+lang;
            console.log('first')
        }
    </script>
@endsection
