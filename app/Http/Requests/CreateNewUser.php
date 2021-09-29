<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewUser extends FormRequest
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
            'name'    => 'required',
            'address' => 'required',
            'hobby'   => 'required',
            'date'    => 'required',
            'gender'  => 'required',
        ];
    }
     /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'    => 'Tên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'hobby.required'   => 'Sở thính không để trống',
            'date.required'    => 'Ngày sinh không để trống',
            'gender.required'  => 'Giới tính không để trống',
        ];
    }
}
