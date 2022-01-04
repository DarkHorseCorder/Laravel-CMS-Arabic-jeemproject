<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
              'name'      => 'required|regex:/^[A-Za-z -]+$/|max:255',
              'email'     => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
              'phone'     => 'required|regex:/^[+][0-9]/',
              'subject'   => 'required|string|max:255',
              'detail'    => 'required|string'
        ];
    }
}
