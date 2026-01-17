<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product')?->id;

        return [
            'category_id' => 'required|exists:product_categories,id',
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'code' => 'nullable|string|max:100',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'slug')->ignore($productId),
            ],
            'description_en' => 'nullable|string|max:10000',
            'description_ar' => 'nullable|string|max:10000',
            'features_en' => 'nullable|string|max:10000',
            'features_ar' => 'nullable|string|max:10000',
            'is_favorite' => 'boolean',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     */
    public function attributes(): array
    {
        return [
            'category_id' => 'Category',
            'name_en' => 'English Name',
            'name_ar' => 'Arabic Name',
            'description_en' => 'English Description',
            'description_ar' => 'Arabic Description',
            'features_en' => 'English Features',
            'features_ar' => 'Arabic Features',
        ];
    }
}
