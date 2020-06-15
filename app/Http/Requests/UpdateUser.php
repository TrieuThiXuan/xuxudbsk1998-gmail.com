<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$this->user,
            'birthday' => 'nullable|date',
            'gender' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được bỏ trống',
            'name.required'  => 'Tên người dùng không được bỏ trống',
            'name.unique'  => 'Tên người dùng đã tồn tại',
            'birthday.date'  => 'Ngày sinh dạng ngày tháng',
        ];
    }
}
