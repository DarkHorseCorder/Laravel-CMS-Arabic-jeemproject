<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd( $this->route('service'));
        return [
            "name"              => "required||unique:services,name,". $this->route('service'),
            "title"             => "required||unique:services,title,". $this->route('service'),
            "slug"              => "required|unique:services,slug,". $this->route('service'),
            "canonical"         => "required|unique:services,canonical,". $this->route('service'),
            "meta_description"  => "required|unique:services,meta_description,". $this->route('service'),
            "body"              => "required|unique:services,body,". $this->route('service'),
            "is_published"      => "nullable"
        ];
    }
}
