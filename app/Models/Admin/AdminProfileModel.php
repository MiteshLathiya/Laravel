<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminProfileModel extends Model
{
    protected $table='users';

    protected $fillable=[

        'email','password'
      ];
}
