<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FieldRequest extends Request
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
            'name_field' => 'required',
             'stt' => 'required|unique:vi_tri_field',
        ];
    }

    /**
     * customize msg error
     * @return array
     */
    public function messages()
    {
        return [
            'name_field.required' => 'Vui lòng nhập name',
            'stt.required' => 'vui lòng nhập Số thứ tự Field',
            'stt.unique' => 'Số thứ tự bị trùng'
           
        ];
    }
}