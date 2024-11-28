<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'article_id' => 'required|exists:articles,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'article_id.required' => 'Article ID is required.',
            'user_id.required' => 'User ID is required.',
            'content.required' => 'Content is required.',
        ];
    }
}
