<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Article title is required.',
            'content.required' => 'Article content is required.',
        ];
    }
}
