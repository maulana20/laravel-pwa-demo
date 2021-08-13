<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use BenSampo\Enum\Rules\EnumValue;
use App\Enums\Product\Category;

class StoreRequest extends FormRequest
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
            'name' => 'required|min:5|max:200',
            'category' => [
                'required',
                new EnumValue(Category::class, false)
            ],
        ];
    }
    
    public function getProduct()
    {
        return [
            'name' => $this->name,
            'category' => $this->category,
        ];
    }
}
