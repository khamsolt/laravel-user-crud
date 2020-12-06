<?php

namespace App\Http\Requests\User;

use App\Enums\User\Gender;
use App\Enums\User\Mode;
use App\Enums\User\Status;
use App\Enums\User\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Create extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password'   => 'required|string|min:6|confirmed',
            'email'      => 'required|email|unique:users',
            'firstname'  => 'required|string|max:50',
            'lastname'   => 'required|string|max:50',
            'patronymic' => 'string|max:50',
            'gender'     => ['string', Rule::in(Gender::toValues())],
            'birthday_at'=> 'date',
            'mood'       => 'string|max:255',
            'about'      => 'string',
            'status'     => ['integer', Rule::in(Status::toValues())],
            'type'       => ['integer', Rule::in(Type::toValues())],
            'mode'       => ['integer', Rule::in(Mode::toValues())],
            'username'   => 'string|unique:users',
        ];
    }
}
