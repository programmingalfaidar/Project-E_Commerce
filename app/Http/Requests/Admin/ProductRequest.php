<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'namaProduct' => 'string|required|max:30',
            'categories_id' => 'required|exists:categories,id',
            'users_id' => 'required|exists:users,id',
            'price' => 'required|integer',
            'deskripsi' => 'required'
        ];
    }
}
