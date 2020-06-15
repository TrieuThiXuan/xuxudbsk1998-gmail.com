<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10240'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Tên người dùng không được bỏ trống',
            'image.mimes'  => 'Ảnh thuộc jpg, png, jpeg',
            'image.max'  => 'Ảnh max 10240Kb',
        ];
    }
}
