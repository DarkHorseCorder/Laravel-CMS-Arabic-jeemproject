<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            "title"             => "required||unique:blogs,title",
            "category_id"       => "required|exists:categories,id",
            "tags"              => "nullable|array",
            "tags.*"            => "exists:tags,id|distinct",
            "slug"              => "required|unique:blogs,slug",
            "canonical"         => "required|unique:blogs,canonical",
            "meta_description"  => "nullable|unique:blogs,meta_description",
            "description"       => "required|string|unique:blogs,description",
            "image"             => "nullable|mimes:jpeg,jpg,png|max:10000",
            "is_published"      => "nullable"
        ];
    }
    public function messages()
    {
        return [
            'image.mimes' => 'Image must be type of: jpeg, jpg, png.',
        ];
    }
}
