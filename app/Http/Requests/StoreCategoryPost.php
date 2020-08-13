<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryPost extends FormRequest
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
            'cateName' => 'required|min:3|max:100'
        ];
    }

    public function messages()
    {
        return [
            'cateName.required' => 'Ban chua nhap ten the loai',
            'cateName.min' => 'Ten the loai toi thieu 3 ki tu tro len',
            'cateName.max' => 'Ten the loai toi da 100 ky tu ',
        ];
    }
}
