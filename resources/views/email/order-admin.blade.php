@extends('email.layouts.main')


@section('title', 'CV Writers Order')
@section('description', 'We have received a order with the following details.')

@section('header')
    <tr>
        <td align="center"
            class="esd-block-text es-m-txt-c"
            esd-links-color="#19BCBD">
            <h2 style="text-align:center;">
                Order&nbsp;<a target="_blank" style="color: #19bcbd;">{{ '#' . $order->id }}</a>
            </h2>
        </td>
    </tr>
    <tr>
        <td align="center"
            class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
            <p style="text-align:center;">
                {{ showDate($order->created_at) }}
            </p>
        </td>
    </tr>
@endsection
@section('content')
     <tr>
        <td class="esd-structure esdev-adapt-off es-p20" align="left">
            <table width="560" cellpadding="0" cellspacing="0" class="esdev-mso-table"  bgcolor="#19BCBD" style="background-color: #19bcbd; border-radius: 10px 0px 0px 10px; border-collapse: separate;" >
                <tbody>
                    <tr>
                        <td class="esdev-mso-td" valign="top" >
                            <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                <tbody>
                                    <tr>
                                        <td width="120" class="esd-container-frame" align="left">
                                            <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#19BCBD">
                                                <tbody>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10t es-p10l">
                                                            <p style="color: #ffffff;"><strong>Name:</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>Email:</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>Contact:</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>Package:</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>Total Amount:</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>Invoice:</strong></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="esdev-mso-td" valign="top">
                            <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                <tbody>
                                    <tr>
                                        <td width="440" align="left" class="esd-container-frame">
                                            <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#19BCBD" style="background-color: #19bcbd; border-radius: 0px 10px 10px 0px; border-collapse: separate;">
                                                <tbody>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10t es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ $order->user->name }}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ $order->user->email }}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ $order->user->phone }}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ $order->package }}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ addCurrency($order->invoice->amount) }}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ $order->invoice->status->name }}</strong></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
