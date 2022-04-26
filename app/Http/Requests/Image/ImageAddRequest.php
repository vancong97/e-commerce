<?php

namespace App\Http\Requests\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImageAddRequest extends FormRequest
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
            'images' => 'mimes:jpeg,jpg,png|required|max:10000',
            'product' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product.required' => trans('message.actionimageProduct'),
            'images.mimes' => trans('message.mime'),
            'images.required' => trans('message.imageUp'),
        ];
    }
}
