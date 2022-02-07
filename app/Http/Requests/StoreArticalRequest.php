<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticalRequest extends FormRequest
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
            'articalName' => 'required|min:5|max:10|unique:articals,name',
            'artialdesc' => 'required|min:20|max:255',
            'articalslug' => 'required|min:5|max:255',
        ];
    }

    public function messages(){
        return [
            'articalName.required' => 'The name of artical is required',
            'articalName.min' => 'The name of artical must be at least 5 char',
            'articalName.max' => 'The name of artical must be max 10 char',
            'articalName.unique' => 'The name of artical must be not repeated',
            
            'artialdesc.required' => 'The details of artical is required',
            'artialdesc.min' => 'The details of artical must be at least 20 char',
            'artialdesc.max' => 'The details of artical must be max 255 char',

            'articalslug.required' => 'The slug of artical is required',
            'articalslug.min' => 'The slug of artical must be at least 5 char',
            'articalslug.max' => 'The slug of artical must be max 255 char',
            
        ];
    }


}
