<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'author' => 'required',
            'detail' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必ず入力してください。',
            'image.required' => 'ファイルは必ず選択してください。',
            'price.required' => '価格は必ず入力してください。',
            'author.required' => '著者名は必ず入力してください。',
            'detail.required' => '詳細は必ず入力してください。',
        ];
    }
}
