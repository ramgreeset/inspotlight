<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'birthed_at' => 'nullable|string',
            'phone' => 'required|string',
            'location' => 'required|string',
            'free_date' => 'nullable|date',
        ];
    }
}
