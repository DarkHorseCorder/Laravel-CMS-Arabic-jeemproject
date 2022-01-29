@extends('layouts.admin')
@section('content')

    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ trans('cruds.setting.title') }}</h5>
                                    <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-sm btn-info my-auto"> {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }} </a>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $setting->name ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $setting->email ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.contact') }}
                                        </th>
                                        <td>
                                            {{ $setting->contact ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Contact Show
                                        </th>
                                        <td>
                                            {{ $setting->contact_show ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.address') }}
                                        </th>
                                        <td>
                                            {{ $setting->address ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.facebook_link') }}
                                        </th>
                                        <td>
                                            {{ $setting->facebook_link ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.instagram_link') }}
                                        </th>
                                        <td>
                                            {{ $setting->instagram_link ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Twitter Link
                                        </th>
                                        <td>
                                            {{ $setting->twitter_link ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.linkedin_link') }}
                                        </th>
                                        <td>
                                            {{ $setting->linkedin_link ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.whatsapp_link') }}
                                        </th>
                                        <td>
                                            {{ $setting->whatsapp_link ?? '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.is_blogs_offers') }}
                                        </th>
                                        <td>
                                            @if ($setting->is_blogs_offers)
                                                <span class="badge bg-success p-2 ms-2">{{ 'Offers' }}</span>
                                            @else
                                                <span class="badge bg-danger p-2 ms-2">{{ 'Not Offer' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.setting.fields.is_services_offers') }}
                                        </th>
                                        <td>
                                            @if ($setting->is_services_offers)
                                                <span class="badge bg-success p-2 ms-2">{{ 'Offers' }}</span>
                                            @else
                                                <span class="badge bg-danger p-2 ms-2">{{ 'Not Offer' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
