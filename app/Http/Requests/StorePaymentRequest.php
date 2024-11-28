<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [<?php

        namespace App\Http\Requests;

        use Illuminate\Foundation\Http\FormRequest;

        class StorePaymentRequest extends FormRequest
        {
            public function authorize()
            {
                return true;
            }

            public function rules()
            {
                return [
                    'subscription_id' => 'required|exists:subscriptions,id',
                    'amount' => 'required|numeric|min:0',
                    'payment_date' => 'required|date',
                    'status' => 'required|string|in:paid,pending,failed',
                ];
            }

            public function messages()
            {
                return [
                    'subscription_id.required' => 'Subscription ID is required.',
                    'amount.required' => 'Amount is required.',
                ];
            }
        }

            //
        ];
    }
}
