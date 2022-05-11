@extends('layouts.web')

@section('title', 'Revision Policy')
@section('description', '')
@section('canonical', config('app.app_url') . Request::path() )

@section('content')

    <section class="container mx-auto my-10 px-4">

        <h1 class="text-primary text-4xl my-4"><strong>Revision Policy</strong></h1>
        <p class="my-2">
            The Revision policy includes:
        </p>
        <ul class="list-disc ml-20 text-primary">
            <li>
                If any changes are required in the content such as blogs, website content, or any other content it can be revised.
            </li>
            <li>
                We give a total of three chances to customers to make changes in their order.
            </li>
            <li>
                Please note that the changes in any order should be addressed within the 5 days of work submission.
            </li>
            <li>
                Incomplete information provided by the client is not subjected to free revisions, for that client needs to pay extra charges.
            </li>
        </ul>

    </section>

@endsection
