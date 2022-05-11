@extends('layouts.web')

@section('title', 'Terms & Conditions')
@section('description', '')
@section('canonical', config('app.app_url') . Request::path())

@section('content')

    <section class="container mx-auto my-10 px-4">

        <h1 class="text-primary text-4xl my-4"><strong>Terms & Conditions</strong></h1>
        <p class="my-2">
            This website offers every kind of content writing service, to proceed with the orders you can go through our website and fill in the website or just can email us on the provided number. We request our clients to provide us with the correct project information so we can contact them back at on right address.
        </p>
        <ul class="list-disc ml-20 text-primary">
            <li>
                Before confirming your order ensure that the payment should be made in advance as to confirm the order.
            </li>
            <li>
                We request all of our clients to provide with the authentic details so as not to have confusions later and we can reach them back at right time easily.
            </li>
            <li>
                The content and design will always be as per the requirements of the client, in case of any change’s client must notify before the order is started.
            </li>
            <li>
                The client has to follow the payment procedure and should share the payment receipt to confirm the order.
            </li>
            <li>
                If any customer wants to cancel the order they must inform the team within 24 hours, after that there will be no cancellation.
            </li>
        </ul>

    </section>

@endsection
