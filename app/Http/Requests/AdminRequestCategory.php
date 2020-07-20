<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'c_name' => 'required|max:30|min:3|unique:categories,c_name,'.$this->id
        ];
    }
    public function messages()
    {
        return[
            'c_name.required' => 'Dữ liệu không được để trống!',
            'c_name.unique'   => 'Dữ liệu đã tồn tại!',
            'c_name.max'      => 'Dữ liệu vượt quá kí tự cho phép!',
            'c_name.min'      => 'Dữ liệu phải nhiều hơn 3 ký tự!'
        ];
    }

}