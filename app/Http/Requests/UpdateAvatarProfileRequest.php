<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAvatarProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => '|mimes:jpeg,jpg,png|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Ảnh không được bỏ trống',
            'image.mimes'  => 'Ảnh thuộc jpg, png, jpeg',
            'image.max'  => 'Ảnh max 10240Kb',
        ];
    }
}
