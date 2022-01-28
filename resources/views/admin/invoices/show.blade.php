@extends('layouts.admin')
@section('content')


    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="invoice p-3 mb-3">
                <div class="row mb-2">
                    <div class="col-12">
                        <h4>
                            {{ $invoice->ref_no }}
                            <small class="float-right">Date: {{ showDate($invoice->created_at) }}</small>
                        </h4>
                    </div>
                </div>

                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        To
                        <address>
                            <strong>{{ $invoice->user->name }}</strong><br>
                            Phone: <i> {{ $invoice->user->phone }} </i><br>
                            Email: <i> {{ $invoice->user->email }} </i>
                        </address>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Level</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $invoice->order->package}}</td>
                                    <td>{{ $invoice->order->careerLevel->name }}</td>
                                    <td>{{ addCurrency($invoice->amount)  }}</td>
                                    <td>
                                        <a href="{{route('admin.invoices.index', array('reference' => $invoice->ref_no) )}}" class="btn btn-primary btn-sm" target="_blank">
                                            Pay with Debit / Credit Card
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 offset-sm-6">
                        <p class="lead">Total</p>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{ addCurrency($invoice->amount) }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ addCurrency($invoice->amount) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
