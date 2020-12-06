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
            'firstname'  => 'required|string|max:50',
            'lastname'   => 'required|string|max:50',
            'patronymic' => 'string|max:50',
            'gender'     => ['numeric', Rule::in(Gender::toValues())],
            'birthday'   => 'date',
            'mood'       => 'string|max:255',
            'about'      => 'string',
            'status'     => ['numeric', Rule::in(Status::toValues())],
            'type'       => ['numeric', Rule::in(Type::toValues())],
            'mode'       => ['numeric', Rule::in(Mode::toValues())],
            'username'   => 'string|unique:users',
        ];
    }
}
