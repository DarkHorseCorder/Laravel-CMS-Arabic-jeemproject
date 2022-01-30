@extends('email.layouts.main')


@section('title', 'CV Writers Account')
@section('description', 'We will be happy to create a professional CV for you that will maximize your chances to stand out among the other candidates within International job market.')

@section('header')
    <tr>
        <td align="center"
            class="esd-block-text es-m-txt-c"
            esd-links-color="#19BCBD">
            <h2 style="text-align:center;">
                Account Details
            </h2>
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
                                                            <p style="color: #ffffff;"><strong>Email:</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>Password:</strong></p>
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
                                                            <p style="color: #ffffff;"><strong>{{ $user->email }}</strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" class="esd-block-text es-p10b es-p10l">
                                                            <p style="color: #ffffff;"><strong>{{ $password }}</strong></p>
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
    <tr>
        <td align="center"
            class="esd-block-button es-p10t es-p10b">
            <span class="es-button-border" style="border-radius: 6px; background: #176765;">
                <a href="https://cvwriters.ae/login" class="es-button" target="_blank"
                    style="border-left-width: 30px; border-right-width: 30px; border-radius: 6px; background: #176765; border-color: #176765;">
                    Login Now
                </a>
            </span>
        </td>
    </tr>
@endsection
