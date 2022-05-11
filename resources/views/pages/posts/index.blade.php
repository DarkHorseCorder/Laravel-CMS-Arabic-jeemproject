
@extends('layouts.web')

@section('title', $page['title'][$locale] . ' | ' . config('app.name'))
@section('description', '')

@section('canonical', config('app.url'))

@section('content')

    <!-- Main Content -->
    <div class="md:w-[954px] px-2 md:px-[15px] md:mt-3 ">

        <h1 class="bg-black text-white font-jeem font-normal text-[3rem] pl-1 mb-4 -mt-3 md:pl-3 md:py-0 rtl:px-2">
            {{ $page['title'][$locale]  }}
        </h1>

        <p class="mt-5">
            @if ($page['info'])
                {{ $page['info'][$locale] }}
            @endif
        </p>

        <div class="h-2 bg-[#8a8a8a] mt-6 mb-10 md:my-12"></div>

        <div class="grid grid-cols-2 gap-y-4 md:gap-y-8 gap-x-8" id="data-wrapper">

            <!-- Results -->

        </div>
        {{-- Data Loader --}}
        <div class="auto-load">
            <svg class="mx-auto" version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>

        <div class="border-t-2 border-b-2 border-dotted border-black py-1 mt-6 text-center">
            <button onclick="loadMore()" class="font-semibold text-sm">
                @lang('translation.more')
            </button>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var page = 0;
        var ENDPOINT = "{{ Request::url() }}";

        function loadMore(){
            page++;
            $.ajax({
                datatype: "html",
                url: ENDPOINT + "?page=" + page,
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (res) {
                if (res.length == 0) {
                    $('.auto-load').html("We don't have more data to display");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(res);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
        }
        loadMore();
    </script>
@endsection
