<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'magazine_id' => 'required|exists:magazines,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User is required.',
            'magazine_id.required' => 'Magazine is required.',
        ];
    }
}
