<?php

namespace App\Models;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\User
 *
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @mixin Eloquent
 * @property int $id
 * @property string|null $remember_token
 * @property string|null $mood
 * @property string|null $thumbnail
 * @property string $email
 * @property string|null $password
 * @property string|null $username
 * @property string $firstname
 * @property string $lastname
 * @property string|null $patronymic
 * @property string|null $gender
 * @property string|null $about
 * @property int $status
 * @property int $type
 * @property int $mode
 * @property Carbon|null $birthday_at
 * @property Carbon|null $email_verified_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|User whereAbout($value)
 * @method static Builder|User whereBirthdayAt($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstname($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastname($value)
 * @method static Builder|User whereMode($value)
 * @method static Builder|User whereMood($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePatronymic($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereThumbnail($value)
 * @method static Builder|User whereType($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mood',
        'thumbnail',
        'username',
        'firstname',
        'lastname',
        'patronymic',
        'birthday_at',
        'gender',
        'about',
        'status',
        'type',
        'mode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'birthday_at' => 'date',
        'email_verified_at' => 'datetime',
    ];
}
