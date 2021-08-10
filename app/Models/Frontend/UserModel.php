<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $fillable=[

        'firstname','lastname','email','mobile'
      ];

    protected $table='registers';
}
