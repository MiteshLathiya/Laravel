<?php

namespace App\Models\Frontend;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $fillable=[

        'firstname','lastname','email','mobile'
      ];

    protected $table='registers';

    public function finduser($id)
    {
        return UserModel::find($id);
    }

    public function alldata()
    {
        return UserModel::all();
    }

    public function updateuser($data, $id)
    {
      

        UserModel::where('id', $id)
              ->update($data);

             
    //  return UserModel->fill($data)->save();
    }

    public function changepassword($passdata, $id)
    {
   
        UserModel::where('id', $id)
        ->update($passdata);
    }
}
