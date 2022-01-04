<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
        foreach (config('translatable.locales') as $locale) {
            $rules[$locale . '.name']   = 'required|string';
            $rules[$locale . '.info']   = 'nullable|string';
        }

        return $rules;
    }

    public function messages()
    {
        foreach (config('translatable.locales') as $locale) {
            $msgs[$locale . '.name.required'] = $locale.' name must required!';
        }

        return $msgs;
    }
}
