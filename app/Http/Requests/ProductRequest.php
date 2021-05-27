<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $item_id = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
        return [
            'ptitle' => 'required',
            'categorie_id' => 'required',
            'purl' => 'required|regex:/^[a-z\d-]+$/|unique:products,purl' . $item_id,
            'particle' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'categorie_id.required' => 'You must choose a category.'
        ];
    }
}