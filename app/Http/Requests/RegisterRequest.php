<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email không được để trống',
            'email.string' => 'email phải là ký tự',
            'email.unique' => 'email bị trùng',
            'password.required' => 'password không được để trống',
            'password.min' => 'Độ dài tối thiểu của password là 8 ký tự',
            'confirmPassword.required' => 'Xác nhận mật khẩu không được để trống',
            'confirmPassword.same' => 'Xác nhận mật khẩu phải trùng khớp với mật khẩu',
        ];
    }
}
