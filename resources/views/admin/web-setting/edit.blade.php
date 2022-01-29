@extends('layouts.admin')
@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @include('partials.backend.addAndBackBtns', [
                                "page_name" => trans('cruds.setting.title_singular'),
                                'back_link' => route('admin.setting.index')
                            ])

                            <form method="POST" action="{{ route("admin.setting.update", [$setting->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="required" for="name">{{ trans('cruds.setting.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $setting->name) }}" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $setting->email) }}" required>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="contact_show">Contact Show</label>
                                    <input class="form-control {{ $errors->has('contact_show') ? 'is-invalid' : '' }}" type="text" name="contact_show" id="contact_show" value="{{ old('contact_show', $setting->contact_show) }}" required>
                                    @if($errors->has('contact_show'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('contact_show') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="contact">{{ trans('cruds.setting.fields.contact') }}</label>
                                    <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', $setting->contact) }}" required>
                                    @if($errors->has('contact'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('contact') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
                                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $setting->address) }}" >
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="facebook_link">{{ trans('cruds.setting.fields.facebook_link') }}</label>
                                    <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $setting->facebook_link) }}" >
                                    @if($errors->has('facebook_link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('facebook_link') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="instagram_link">{{ trans('cruds.setting.fields.instagram_link') }}</label>
                                    <input class="form-control {{ $errors->has('instagram_link') ? 'is-invalid' : '' }}" type="text" name="instagram_link" id="instagram_link" value="{{ old('instagram_link', $setting->instagram_link) }}" >
                                    @if($errors->has('instagram_link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('instagram_link') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="twitter_link">Twitter Link</label>
                                    <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', $setting->twitter_link) }}" >
                                    @if($errors->has('twitter_link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('twitter_link') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="linkedin_link">{{ trans('cruds.setting.fields.linkedin_link') }}</label>
                                    <input class="form-control {{ $errors->has('linkedin_link') ? 'is-invalid' : '' }}" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', $setting->linkedin_link) }}" >
                                    @if($errors->has('linkedin_link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('linkedin_link') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="required" for="whatsapp_link">{{ trans('cruds.setting.fields.whatsapp_link') }}</label>
                                    <input class="form-control {{ $errors->has('whatsapp_link') ? 'is-invalid' : '' }}" type="text" name="whatsapp_link" id="whatsapp_link" value="{{ old('whatsapp_link', $setting->whatsapp_link) }}" >
                                    @if($errors->has('whatsapp_link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('whatsapp_link') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_blogs_offers" id="is_blogs_offers" {{ old('is_blogs_offers', $setting->is_blogs_offers) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="is_blogs_offers">Is Blogs Offer ?</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_services_offers" id="is_services_offers" {{ old('is_services_offers', $setting->is_services_offers) ? 'checked' : '' }}/>
                                    <label class="form-check-label" for="is_services_offers">Is Services Offer ?</label>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-danger" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
