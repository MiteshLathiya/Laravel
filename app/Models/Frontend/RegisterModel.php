<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $fillable=[
        'firstname','lastname','email','mobile','password'
    ];

    protected $table='registers';

    public function generateToken()
    {
        $this->api_token = random_bytes(60);
        $this->save();

        return $this->api_token;
    }

    public function userinsert($data)
    {
        $user = new RegisterModel;

        $user->create($data);
    }
}
