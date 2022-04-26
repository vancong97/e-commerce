<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEditRequest extends FormRequest
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
            'name' => 'required|unique:categories,name,' . $this->segment(2),
            'description' => 'required',
            'parent' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validate.Category.name'),
            'name.unique' => trans('validate.Category.unique'),
            'description.required' => trans('validate.Category.description'),
            'parent.required' => trans('validate.Category.parent'),
        ];
    }
}
