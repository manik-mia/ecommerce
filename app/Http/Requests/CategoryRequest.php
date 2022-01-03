<?php

namespace App\Http\Requests;

class CategoryRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon'    => 'required',
        ];
    }
}
