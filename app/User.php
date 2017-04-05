<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Klaravel\Ntrust\Traits\NtrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use NtrustUserTrait;

    protected static $roleProfile = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email','foto','noHp', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
{
  return $this->hasMany(Message::class);
}

}
