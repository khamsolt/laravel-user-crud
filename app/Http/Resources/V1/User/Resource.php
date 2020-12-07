<?php

namespace App\Http\Resources\V1\User;

use Carbon\Carbon;
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
            'gender' => $this->gender,
            'about' => $this->about,
            'type' => $this->type,
            'status' => $this->status,
            'mode' => $this->mode,
            'birthday' => $this->getDate($this->birthday_at, 'd.m.Y'),
            'verified' => $this->getDate($this->email_verified_at, 'd.m.Y H:i:s'),
            'created' => $this->created_at
        ];
    }

    public function getDate(?string $value, string $format = "U"): ?string
    {
        return empty($value) ? null : $this->birthday_at->format($format);
    }
}
