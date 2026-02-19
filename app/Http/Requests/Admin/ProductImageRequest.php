<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
        $rules = [
            'product_id' => 'required|exists:products,id',
            'color_id' => 'nullable|exists:product_colors,id',
            'alt_en' => 'nullable|string|max:255',
            'alt_ar' => 'nullable|string|max:255',
            'is_main' => 'boolean',
            'is_hover' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ];

        if ($this->isMethod('POST')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        return $rules;
    }

    /**
     * Get custom attribute names for validator errors.
     */
    public function attributes(): array
    {
        return [
            'product_id' => 'Product',
            'color_id' => 'Color',
            'alt_en' => 'English Alt Text',
            'alt_ar' => 'Arabic Alt Text',
        ];
    }
}
