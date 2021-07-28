<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminProfileModel extends Model
{
    protected $table='users';

    protected $fillable=[

        'email','password'
      ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'id');
    }
}
