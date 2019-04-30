<?php

namespace App\Http\Requests;

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
    public function rules()
    {
         $rules = [
            'category_id' => 'not_in:0',
            'name' => 'required|string|min:3',
            'description' => 'required|min:10',
            'keywords' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'weight' => 'required|numeric',
            'size' => 'required|string',
            'status' => 'not_in:0',
        ];

        if (request()->isMethod('put')) {
            $rules['code'] = 'required|numeric|exists:products,code';
        }
        if (request()->isMethod('post')) {
            $rules['code'] = 'required|numeric|unique:products,code';
        }

        return $rules;
    }
}
