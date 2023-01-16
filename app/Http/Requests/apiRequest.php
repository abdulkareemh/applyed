<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class apiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
         'number' => 'required|min_digits:10|max_digits:10|numeric|starts_with:0',
         
        ];
    }
}
