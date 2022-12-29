<?php

namespace App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'day'      => ['required', 'date_format:Y-m-d'],
            'classes'  => ['required', 'array'],
            'classes.*.name' => ['required', 'string'],
            'classes.*.task' => ['string'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['day' => $this->route('day')]);
    }

}
