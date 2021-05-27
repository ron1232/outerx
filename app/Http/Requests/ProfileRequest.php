<?php

namespace App\Http\Requests;

use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|min:2|max:70',
            'email' => 'required|email|unique:users,email,' . Session::get('user_id'),
            'password' => 'nullable|min:6|max:20|confirmed',
            'country' => 'required',
            'image' => 'nullable|image'
        ];
    }
}