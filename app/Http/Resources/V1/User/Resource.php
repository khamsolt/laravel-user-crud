<?php

namespace App\Http\Resources\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'thumbnail' => $this->thumbnail,
            'mood' => $this->mood,
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'patronymic' => $this->patronymic,
            'gender' => $this->gender->label,
            'about' => $this->about,
            'type' => $this->type->label,
            'status' => $this->status->label,
            'mode' => $this->mode->label,
            'birthday' => $this->birthday_at,
            'verivied' => $this->email_verified_at,
            'created' => $this->created_at
        ];
    }
}
