<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
        return [
            "name"              => "required|unique:services,name",
            "title"             => "required|unique:services,title",
            "slug"              => "required|unique:services,slug",
            "canonical"         => "required|unique:services,canonical",
            "meta_description"  => "required|unique:services,meta_description",
            "body"              => "required|unique:services,body",
            "is_published"      => "nullable"
        ];

    }
}
