<aside class="hidden md:block w-[85px] pr-[15px] rtl:pr-0 rtl:pl-[15px]">
    <a href="{{ route('home') }}" class="w-[70px] h-[125px] pr-[15px] rtl:pr-0 rtl:pl-[15px]">
        <div class="demo">
            <div id="hello"class="Animation animate">
            </div>
        </div>
        <img class="w-[70px] pt-[15px]" src="{{ asset('imgs/sitename.png') }}" alt="">
    </a>
    <nav>
        <ul class="menu">
            @if (!empty($categories))
                @foreach ($categories as $category)
                    <li>
                        <a class="nav-item {{ urldecode( url()->current() ==  route('post.index', $category->getTranslation('slug', $locale))) ? 'active' : ''}}" href="{{ LaravelLocalization::getLocalizedURL( $locale, route('post.index', $category->getTranslation('slug', $locale ))) }}">
                            {{ $category->getTranslation('title', $locale) }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </nav>

    <div class="menu-block-wrapper menu-block-5 menu-name-menu-formats parent-mlid-0 menu-level-1">
        <ul class="menu-2">
            @if (!empty($menus))
                @foreach ($menus as $menu)
                    <li class="">
                        <a class="hover:text-pink" href="{{ route('post.index', $menu->getTranslation('slug', $locale))}}">{{ $menu->getTranslation('title', $locale) }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <div>
        <ul class="mt-4 flex space-x-1 justify-center items-center">
            <li><a href="{{ $web_setting->facebook_link ?? '#' }}"><i class="fa-brands fa-facebook-f side-icon"></i></a></li>
            <li><a href="{{ $web_setting->instagram_link ?? '#' }}"><i class="fa-brands fa-instagram side-icon"></i></a></li>
            <li><a href="{{ $web_setting->twitter_link ?? '#' }}"><i class="fa-brands fa-twitter side-icon"></i></a></li>
        </ul>
        <ul class="text-center">
            <li><a href="{{ $web_setting->youtube_link ?? '#' }}"><i class="fa-brands fa-youtube side-icon"></i></a></li>
        </ul>
    </div>

    <div class="border-t-2 border-black mt-4">
        
        <ul class="flex justify-center items-center my-2 divide-black divide-x-2 rtl:divide-x-reverse">
            @if (!empty($pageURLs))
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if ($locale == $localeCode)
                        @continue
                    @endif
                    <li class="px-1">
                        <a rel="alternate" class="uppercase " hreflang="{{ $localeCode }}" href="{{
                        LaravelLocalization::getLocalizedURL($localeCode, ($pageURLs) ? $pageURLs[$localeCode] : null,
                        // null,
                        [],
                        true) }}">
                            {{ $localeCode == 'ar' ? 'ء' : $localeCode }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
        
    </div>
    <div>

        <form action="{{ route('search') }}" method="GET">
            <input placeholder="Search..." class=" relative focus:z-50 focus:w-48 transition ease-in duration-700 rounded-2xl border border-black text-sm px-2 w-20 py-1 mt-1 bg-bg" type="search" name="k" title="Search">
        </form>

    </div>
</aside>
