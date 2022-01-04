<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
        // dd($this->route('blog'));
        $id = $this->route('blog.id');
        return [
            "title"             => "required|unique:blogs,title,". $id,
            "category_id"       => "required|exists:categories,id",
            "tags"              => "nullable|array",
            "tags.*"            => "exists:tags,id|distinct",
            "slug"              => "required|unique:blogs,slug,". $id,
            "canonical"         => "nullable|unique:blogs,canonical,". $id,
            "meta_description"  => "nullable|unique:blogs,meta_description,". $id,
            "description"       => "required|string|unique:blogs,description,". $id,
            "is_published"      => "nullable"
        ];
    }

}
