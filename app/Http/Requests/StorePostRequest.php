<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        $rules = [
            "author_id"     =>  'required|exists:authors,id',
            "categories"    =>  'required|array',
            "tags"          =>  'nullable|array',
            'title.*'       =>  'nullable|unique_translation:posts',
            // 'slug.*'        =>  ['required', UniqueTranslationRule::for('posts')],
            'body.*'        =>  'nullable|unique_translation:posts',
        ];

        // foreach (config('translatable.locales') as $locale) {
        //     $rules['title.' .$locale]      = 'string';
        //     $rules['body.'  .$locale]      = 'string';
        // }

        return $rules;
    }


    public function messages()
    {
        $msgs['categories.required']   = ' :attribute must required!';

        // $msgs['title.en.']   = ' :attribute must required!';

        foreach (config('translatable.locales') as $locale) {
            $msgs['title.'.$locale.'.required']     = ':attribute must be required!';
            // $msgs['body.'.$locale.'.required']      = ':attribute must be required!';
            $msgs['title.'.$locale.'.unique']       = ':attribute must be unique!';
            $msgs['body.'.$locale.'.unique']        = ':attribute must be unique!';
        }

        return $msgs;
    }
}
