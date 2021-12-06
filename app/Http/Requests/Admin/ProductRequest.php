<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:191',
            'description' => 'nullable|min:10',
            'product_category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'nullable|numeric',
            'stock_defective' => 'nullable|numeric',
            'image1' => 'nullable|image|max:2000000',
            'image2' => 'nullable|image|max:2000000',
            'image3' => 'nullable|image|max:2000000',
        ];
    }
}