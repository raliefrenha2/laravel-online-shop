<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
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
            'webname' => 'required|min:5',
            'email' => 'nullable|email|max:50',
            'address' => 'nullable|max:50',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg',
        ];
    }
}
