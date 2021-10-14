<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{

    protected $fillable=[
        'firstname','lastname','email','mobile','password'
    ];

    protected $table='registers';

  

    public function userinsert($data)
    {

        return  RegisterModel::create($data);
    }
}
