@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-1 col-md-10">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"> Summary </h3>
                        </div>
                        <div class="card-body">

                            <dl class="row text-muted mb-0">
                                <dt class="col-sm-3 text-right mb-0">Customer Name:</dt>
                                <dd class="col-sm-9 mb-0">{{$contact->name}}</dd>

                                <dt class="col-sm-3 text-right mb-0">Email:</dt>
                                <dd class="col-sm-9 mb-0">{{$contact->email}}</dd>

                                <dt class="col-sm-3 text-right mb-0">Phone:</dt>
                                <dd class="col-sm-9 mb-0">{{$contact->phone}}</dd>

                                <dt class="col-sm-3 text-right mb-0">Subject:</dt>
                                <dd class="col-sm-9 mb-0">{{$contact->subject}}</dd>

                                <dt class="col-sm-3 text-right mb-0">Date:</dt>
                                <dd class="col-sm-9 mb-0">{{ showDateTime($contact->created_at) }}</dd>
                            </dl>

                            <hr>

                            <dl class="row text-muted mb-0">
                                <dt class="col-sm-3 text-right mb-0">Details:</dt>
                                <dd class="col-sm-9 mb-0">{!! $contact->detail !!} lorem</dd>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
