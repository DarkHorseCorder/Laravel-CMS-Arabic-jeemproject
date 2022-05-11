@extends('layouts.web')

@section('title', 'About Us')
@section('description', '')
@section('canonical', config('app.url') . Request::path() )


@section('content')

    <!-- Main -->
    <div class="md:w-[954px] px-[15px] ">

        <h1 class="bg-black text-white text-lg pl-1 py-1 -mt-3 md:text-4xl md:pl-3 md:py-3 [word-spacing:13px]">About Us</h1>

        <div class="page-section mt-6 mb-10 md:my-12 border-b-[1px] border-dotted border-black">
            <h3>About Jeem</h3>
            <p>Jeem is a feminist media organization that envisions a world where the dominant narratives in the Arabic-speaking region and its diaspora are inclusive, and defy patriarchal norms.</p>
            <p>Through an intersectional approach, we produce and disseminate critical and cultural knowledge about gender, sexuality, sex, and the body that challenges dominant discourses in traditional media. We provide a safe space for individuals and groups to share and discuss their views and experiences regarding gender and sexuality and their multiple intersections with our lives in its different dimensions. We work towards building and strengthening links and ties between individuals and/or groups involved in these issues.</p>
            <h4>A Brief History of Jeem:</h4>
            <p>In 2018, Jeem was launched as a project of the Goethe-Institut, concerned with the production of critical and cultural knowledge on issues of gender, sexuality, the body and sexuality, outside the mainstream discourse of the dominant media. In 2022, Jeem was registered as an independent, not-for-profit media organization.</p>
            <hr class=" border-dotted border-black mb-2 mt-14">
        </div>

    </div>

@endsection
