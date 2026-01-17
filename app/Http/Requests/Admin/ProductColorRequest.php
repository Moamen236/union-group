<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductColorRequest extends FormRequest
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
        return [
            'product_id' => 'required|exists:products,id',
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:100',
            'hex_code' => 'required|string|regex:/^#[A-Fa-f0-9]{6}$/',
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
            'product_id' => 'Product',
            'name_en' => 'English Color Name',
            'name_ar' => 'Arabic Color Name',
            'hex_code' => 'Color Code',
        ];
    }

    /**
     * Get custom error messages.
     */
    public function messages(): array
    {
        return [
            'hex_code.regex' => 'The color code must be a valid hex color (e.g., #FF0000).',
        ];
    }
}
