<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UserModel extends Model
{
    use Sortable;


    protected $fillable=[

        'firstname','lastname','email','mobile'
      ];

    protected $table='registers';

    public $sortable = [
        'firstname','lastname','email','mobile'
    ];
}
