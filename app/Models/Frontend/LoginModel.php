<?php

namespace App\Models\Frontend;

// use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginModel extends Authenticatable
{
    use HasApiTokens, Notifiable;

        protected $guard = 'registers';

        protected $fillable=[
            'firstname','lastname','email','mobile','password'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $table='registers';
}
