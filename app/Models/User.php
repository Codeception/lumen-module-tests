<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

final class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /** @var string */
    protected $table = 'users';

    /** @var array */
    protected $fillable = [
        'email',
        //'api_token'
    ];

    /** @var array */
    protected $hidden = [
        'password',
        //'api_token'
    ];
}