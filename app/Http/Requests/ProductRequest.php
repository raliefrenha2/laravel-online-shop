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
            'category_id' => 'required|integer',
            'product_name' => 'required|string|min:3',
            'description' => 'required|min:10',
            'keywords' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'weight' => 'required|numeric',
            'size' => 'required|string',
            'product_status' => 'required',
        ];

        if (request()->isMethod('put')) {
            $rules['product_code'] = 'required|numeric|exists:products,product_code';
        }
        if (request()->isMethod('post')) {
            $rules['product_code'] = 'required|numeric|unique:products,product_code';
        }

        return $rules;
    }
}
