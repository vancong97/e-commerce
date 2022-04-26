<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'description' => 'required',
            'status' => 'required',
            'category' => 'required',
            'images' => 'required|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validate.Product.name'),
            'name.unique' => trans('validate.Product.unique'),
            'description.required' => trans('validate.Product.description'),
            'category.required' => trans('validate.Product.category'),
            'status.required' => trans('validate.Product.status'),
            'price.required' => trans('validate.Product.price'),
            'images.mimes' => trans('message.mime'),
            'images.required' => trans('message.imageUp'),
        ];
    }
}
