<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuatationRequest extends FormRequest
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
            "name"  => 'required|string',
            "email" => 'required|email',
            "phone" => 'required',
            "file"  => 'nullable|file|mimes:pdf,ppt,pptx,doc,docx,jpeg,jpg,png,zip,rar|max:250000',
        ];
    }
}
