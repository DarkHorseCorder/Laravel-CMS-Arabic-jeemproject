<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title.*'       =>  'required|unique_translation:pages',
            'slug.*'        =>  'required|unique_translation:pages',
            'body.*'        =>  'nullable|unique_translation:pages',
        ];

        // foreach (config('translatable.locales') as $locale) {
        //     $rules['title.' .$locale]      = 'string';
        //     $rules['body.'  .$locale]      = 'string';
        // }

        return $rules;
    }
}
