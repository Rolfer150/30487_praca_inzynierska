<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:32'],
            'surname' => ['string', 'max:32'],
            'image_path' => ['file', 'mimes:png,jpg,gif', 'max:3072'],
//            'phone_number' => ['phone:PL'],
            'school' => ['string', 'max:64'],
            'short_description' => ['string', 'max:128'],
            'description' => ['string', 'nullable'],
            'birth_date' => ['date'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
