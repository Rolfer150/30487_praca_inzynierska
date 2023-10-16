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
            'name' => ['required', 'unique:offers', 'max:64'],
            'salary' => ['nullable', 'numeric'],
            'payment' => ['nullable'],
            'vacancy' => ['nullable'],
            'description' => ['nullable'],
            'image_path' => ['nullable'],
//            'category_id' => ['required'],
//            'employment_id' => ['required'],
//            'contract_id' => ['required'],
//            'work_mode_id' => ['required'],
        ];
    }

//    protected function prepareForValidation(): void
//    {
//        $this->merge([
//            'category_id' => $this->category_id,
//            'employment_id' => $this->employment_id,
//            'contract_id' => $this->contract_id,
//            'work_mode_id' => $this->work_mode_id,
//        ]);
//    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        return array_merge($validated, [
            'category_id' => $this->category_id,
            'employment_id' => $this->employment_id,
            'contract_id' => $this->contract_id,
            'work_mode_id' => $this->work_mode_id,
        ]);
    }
}
