<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'catName' => 'required|min:5|max:10|unique:categories,name'
        ];
    }

    public function messages(){
        return [
            'catName.required' => 'This field is required',
            'catName.min' => 'name must be at least 5 char',
            'catName.max' => 'name must be max 10 char',
            'catName.unique' => 'name must be not repeated',
        ];
    }
}
