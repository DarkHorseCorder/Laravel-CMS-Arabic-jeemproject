
{{-- Mobile Menu--}}

<div class="md:hidden pt-6 pb-[0.45rem] mx-2 border-b border-black mb-5" x-data="{showMenu : false}">
    <div class="flex justify-between ">
        <button @click.prevent="showMenu = !showMenu " class="mobileIcon py-4 flex justify-between ">
        </button>

        <img class="" src="{{ asset('imgs/sitename.png')}}" alt="" style="height: 3rem; margin-left: 45px; margin-top: -2px;">

        <a href="{{ route('home') }}">
            <img class="mb-1 -mt-2" src="{{ asset('imgs/jeem-1.png')}}" alt="" style="height: 3.5rem;">
        </a>
    </div>

    <div x-show="showMenu" class="border-t border-black mt-3">

        <div class="grid grid-cols-2 gap-x-6 my-3 px-3">

            <div class="col-span-1">
                <h4 class="text-base pb-1">Sections</h4>
                <div class="border-t-4 border-black ">
                    <ul class="mb-4" style="font-size: 14px; line-height: 2.5;">
                        @if (!empty($categories))
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('post.index', $category->getTranslation('slug', session("lang_code", 'ar'))) }}" class="hover:text-primary-one block border-b-[1px] border-t-[1px] border-dotted border-black">
                                        {{ $category->getTranslation('title',session("lang_code", 'ar')) }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-span-1">
                <h4 class=" text-lg" style="visibility: hidden;">Sections</h4>
                <div class="border-t-4 border-black ">
                    <ul class="mb-4 mt-2" style="font-size: 14px; line-height: 2;">
                        @if (!empty($menus))
                            @foreach ($menus as $menu)
                                <li>
                                    <a class="hover:text-primary-one" href="{{ $menu->getTranslation('slug',session("lang_code", 'ar'))}}">
                                        {{ $menu->getTranslation('title',session("lang_code", 'ar')) }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="border-t-4 border-black">
                    <ul class="mt-2 mb-6" style="font-size: 14px; line-height:1.9;">
                        <li><a class="hover:text-primary-one" href="#">About Us</a></li>
                        <li><a class="hover:text-primary-one" href="#">Contact Us</a></li>
                        <li><a class="hover:text-primary-one" href="#">Online Code of Conduct</a></li>
                        <li><a class="hover:text-primary-one" href="#">Our Partners</a></li>
                        <li><a class="hover:text-primary-one" href="#">Privacy</a></li>
                        <li><a class="hover:text-primary-one" href="#">السياسة التحريرية لجيم</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-2 gap-x-6 mb-4 px-3">
            <div class="border-t-4 border-black">
                <ul class="mt-2 flex space-x-1 justify-center items-center">
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>

            <div class="border-t-4 border-black ">
                <ul class="flex space-x-2 mt-2">
                    <li class="">
                        <a href="#" class="">
                            <span class="hover:text-primary-one text-base font-semibold">DE</span>
                        </a>
                    </li>
                    <li class="">
                        <span class="font-semibold">|</span>
                    </li>
                    <li class="">
                        <a href="#" class="">
                            <span class="hover:text-primary-one text-base font-semibold">ء</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="px-3">
            <input placeholder="Search" type="text" id="edit-k" name="k" value="" size="30" maxlength="128" class="mb-6 form-text"
            style=" width: 100%; background-color: transparent; border: 1px solid; border-radius: 20px; padding-left: 9px;">
        </div>

    </div>
</div>
