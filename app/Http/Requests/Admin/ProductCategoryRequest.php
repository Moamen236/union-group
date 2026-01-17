<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends FormRequest
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
        $categoryId = $this->route('product_category')?->id;

        return [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('product_categories', 'slug')->ignore($categoryId),
            ],
            'image' => $this->isMethod('POST')
                ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
                : 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description_en' => 'nullable|string|max:5000',
            'description_ar' => 'nullable|string|max:5000',
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
            'name_en' => 'English Name',
            'name_ar' => 'Arabic Name',
            'description_en' => 'English Description',
            'description_ar' => 'Arabic Description',
        ];
    }
}
