<?php

namespace App\Http\Requests\Api\Rating;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'number' => 'nullable|integer'
        ];
    }
}
