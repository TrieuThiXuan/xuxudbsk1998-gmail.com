<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotion extends FormRequest
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
            'summary' => 'required',
            'content' => 'nullable',
            'began_at' => 'date|required',
            'finished_at' => 'date|required|after_or_equal:began_at',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10240',
            'address' => 'required',
            'category_id' => 'required',
            'vendor_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được bỏ trống',
            'summary.required'  => 'Tóm tắt bài đăng không được bỏ trống',
            'began_at.date'  => 'Ngày bắt đầu dạng ngày tháng',
            'began_at.required'  => 'Ngày bắt đầu không được bỏ trống',
            'finished_at.date'  => 'Ngày kết thúc dạng ngày tháng',
            'finished_at.required'  => 'Ngày kết thúc không được bỏ trống',
            'finished_at.after_or_equal'  => 'Ngày kết thúc sau hoặc bằng ngày bắt đầu',
            'image.mimes'  => 'Ảnh thuộc jpg, png, jpeg',
            'image.max'  => 'Ảnh max 10240Kb',
            'address.required' => 'Địa điểm không được bỏ trống',
            'category_id.required' => 'Thể loại không được bỏ trống',
            'vendor_id.required' => 'Người cung cấp không được bỏ trống',
        ];
    }
}
