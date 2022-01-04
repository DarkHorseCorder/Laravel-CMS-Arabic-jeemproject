<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            'en.title' => 'required',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.title'] = 'string';
        }

        return $rules;
    }

    public function messages()
    {
        foreach (config('translatable.locales') as $locale) {
            $msgs[$locale . '.title.required'] = $locale.' title must required!';
        }

        return $msgs;
    }

}
