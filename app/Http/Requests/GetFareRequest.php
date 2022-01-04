<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetFareRequest extends FormRequest
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
            "academic_level_id" => "required||exists:academic_levels,id",
            "deadline_id" => 'required|exists:deadlines,id',
        ];
    }
}
