<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:offers', 'max:64'],
            'slug' => ['required', 'unique:offers', 'max:80'],
            'category_id' => ['required'],
            'employment_id' => ['required'],
            'contract_id' => ['required'],
            'work_mode_id' => ['required'],
        ];
    }
}
