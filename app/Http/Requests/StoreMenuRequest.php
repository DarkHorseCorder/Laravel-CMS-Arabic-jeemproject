<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            $rules[$locale . '.title'] = 'nullable|string';
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
