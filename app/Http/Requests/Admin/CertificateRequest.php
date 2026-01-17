<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'type' => 'required|in:pdf,image',
            'issuer_en' => 'nullable|string|max:255',
            'issuer_ar' => 'nullable|string|max:255',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after_or_equal:issue_date',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ];

        if ($this->isMethod('POST')) {
            $rules['file'] = 'required|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:5120';
        } else {
            $rules['file'] = 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:5120';
        }

        return $rules;
    }

    /**
     * Get custom attribute names for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name_en' => 'English Name',
            'name_ar' => 'Arabic Name',
            'issuer_en' => 'English Issuer',
            'issuer_ar' => 'Arabic Issuer',
        ];
    }
}
