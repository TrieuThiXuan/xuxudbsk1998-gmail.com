<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionStore extends FormRequest
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
            'content' => 'required',
            'began_at' => 'date|required',
            'finished_at' => 'date|required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10240',
            'address' => 'required',
            'category_id' => 'required',
            'vendor_id' => 'required',
        ];
    }
}
