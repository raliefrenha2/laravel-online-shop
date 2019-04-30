<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3|string'
        ];

        if (request()->isMethod('put')) {
            $rules['sort'] = 'required|numeric|exists:categories,sort';
        }
        if (request()->isMethod('post')) {
            $rules['sort'] = 'required|numeric|unique:categories,sort';
        }

        return $rules;

    }
}
