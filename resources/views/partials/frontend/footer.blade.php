<footer>
    <!-- Desktop Footer -->
    <div class="hidden md:block border-t-4 border-black mt-[56px] ">
        <div class="flex">
            <div class="w-[85px] mt-[53px] rtl:ml-8">
                <a href="{{ route('home') }}" class="w-[85px] h-[125px] pr-[15px]">
                    <div class="demo">
                        <div id="hello"class="Animation animate">
                        </div>
                    </div>
                    <img class="w-[70px] rtl:w-[80px] py-[20px]" src="{{ asset('imgs/sitename.png') }}" alt="">
                </a>
            </div>

            <div class="w-full border-b border-black mb-6">
                <div class="grid grid-cols-5 gap-x-6 pt-5">
                    <div class="col-span-1"> </div>
                    <div class="col-span-2">
                        <h4 class="text-lg rtl:text-3xl rtl:font-bold pb-1">@lang('translation.sections')</h4>
                    </div>
                    <div class="col-span-1"> </div>
                    <div class="col-span-1"> </div>
                </div>
                <div class="grid grid-cols-5 gap-x-6 pb-6">
                    <div class="col-span-1">
                        <div class="border-t-4 border-black ml-6">
                            <ul class="f-cat my-4 text-sm rtl:text-base">
                                @if (!empty($menus))
                                    @foreach ($menus as $menu)
                                        <li>
                                            <a class="hover:text-primary-one"
                                            href="{{ route('post.index', $menu->getTranslation('slug', $locale)) }}">
                                            {{ $menu->getTranslation('title', $locale) }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="border-t-4 border-black">
                            <div class="flex justify-between space-x-4 rtl:space-x-8">
                                @php
                                    $cols = 2;
                                    $rows = 4;
                                    $counter = 0;
                                @endphp

                                @for ($c = 0; $c < $cols; $c++)
                                    <div class="f-sec space-y-1 md:w-48 mt-4 text-sm rtl:text-xl rtl:font-bold ">
                                        @for ($r = 0; $r < $rows; $r++)
                                            @if (!empty($categories))
                                                <a class="hover:text-primary-one block border-b-[1px] border-black rtl:ml-3  {{ urldecode( url()->current() ==  route('post.index', $categories[$counter]->getTranslation('slug', $locale))) ? 'active' : ''}}" href="{{LaravelLocalization::getLocalizedURL( $locale,  route('post.index', $categories[$counter]->translate('slug', $locale))) }}"
                                                    href="{{ route('post.index', $categories[$counter]->translate('slug', $locale) ) }}">
                                                    {{ $categories[$counter]->translate('title', $locale) }}
                                                </a>
                                                @php $counter++; @endphp
                                            @endif
                                        @endfor
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="border-t-4 border-black">
                            <ul class="mt-4 f-cat my-4 text-sm rtl:text-base">
                                @foreach ($pages as $page)
                                    <li>
                                        <a class="hover:text-primary-one">
                                            {{ $page->getTranslation('title', $locale) }}
                                        </a>
                                    </li>
                                @endforeach
                                {{-- <li><a class="hover:text-primary-one" href="{{ LaravelLocalization::getLocalizedURL( $locale, route('about.us')) }}"> @lang('routes.about')</a></li> --}}
                                {{-- <li><a class="hover:text-primary-one" href="#">Contact Us</a></li>
                                <li><a class="hover:text-primary-one" href="#">Online Code of Conduct</a></li>
                                <li><a class="hover:text-primary-one" href="#">Our Partners</a></li>
                                <li><a class="hover:text-primary-one" href="#">Privacy</a></li>
                                <li><a class="hover:text-primary-one" href="#">السياسة التحريرية لجيم</a></li> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div class="border-t-4 border-black">
                            <ul class="mt-4 flex space-x-1 justify-center items-center">
                                <li><a href="#"><i class="fa-brands fa-facebook-f rtl:ml-[3px] side-icon"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram side-icon"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter side-icon"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-youtube side-icon"></i></a></li>
                            </ul>
                        </div>
                        <div class="border-t-2 border-black mt-4">
                            <img src="{{ asset('imgs/by-nc-sa.svg') }}" class="mx-auto mt-4">

                            <p class="text-center mt-1 rtl:text-sm mx-4 ">
                                <a href="#" class="text-primary-one">@lang('translation.some')</a>
                                @lang('translation.rights')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile Footer -->
    <div class="block md:hidden border-t-4 border-black mt-[20px]">
        <div class="text-center my-6">
            <h4 class="text-base ">About Us</h4>
        </div>
    </div>

</footer>
