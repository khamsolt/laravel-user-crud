<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Arr;

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
        return array_merge($rules, [
                'firstname' => 'string|max:50',
                'lastname' => 'string|max:50',
                'email' => 'email|unique:users',
                'password' => 'string|min:6',
            ]
        );
    }
}
