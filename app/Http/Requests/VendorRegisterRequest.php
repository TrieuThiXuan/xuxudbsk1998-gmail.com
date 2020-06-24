<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRegisterRequest extends FormRequest
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
            'email' => [
                'required',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10240',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được bỏ trống',
            'name.required'  => 'Tên người dùng không được bỏ trống',
            'email.unique'  => 'Tên người dùng đã tồn tại',
            'password.required'  => 'Mật khẩu không được bỏ trống',
            'password.min'  => 'Mật khẩu ít nhất chứ 8 kí tự',
            'avatar.mimes'  => 'Ảnh thuộc jpg, png, jpeg',
            'avatar.max'  => 'Ảnh max 10240Kb',
        ];
    }
}
