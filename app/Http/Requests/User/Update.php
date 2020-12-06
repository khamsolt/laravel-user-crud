<?php

namespace App\Http\Requests\User;

class Update extends Create
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = parent::rules();
        return [
            ...$rules,
            'firstname' => 'string|max:50',
            'lastname' => 'string|max:50',
        ];
    }
}
