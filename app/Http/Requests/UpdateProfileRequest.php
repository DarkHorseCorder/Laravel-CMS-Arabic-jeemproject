<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'name'      => ['required', 'string', 'max:255'],
            // 'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'phone'     => 'required|string|max:255|unique:users,phone,' . auth()->id(),
            'address'   => 'nullable',
            'city'      => 'nullable',
            'state'     => 'nullable',
            'country'   => 'nullable|exists:countries,code',
            'zip_code'  => 'nullable|numeric|digits_between:2,5',
        ];
    }
}
