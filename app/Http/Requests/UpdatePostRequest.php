<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $id = $this->route('post.id');
        $rules = [            
            'title.*'       =>  'nullable|unique_translation:posts,title,'. $id,
            "author_id"     =>  'required|exists:authors,id',
            "categories"    =>  'required|array',
            "tags"          =>  'nullable|array',
            // 'slug.*'        =>  ['required', UniqueTranslationRule::for('posts')],
            'body.*'        =>  'nullable|unique_translation:posts,body,'. $id,
        ];

        // foreach (config('translatable.locales') as $locale) {
        //     $rules['title.' .$locale]      = 'string';
        //     $rules['body.'  .$locale]      = 'string';
        // }

        return $rules;
    }
}
