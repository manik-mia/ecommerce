<?php

namespace App\Http\Requests;

class BrandRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_name_en' => 'required | min: 2 ',
            'brand_name_bn' => 'required | min: 2 ',
            'brand_image'   => ' image',
        ];
    }
}
