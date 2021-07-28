<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// namespace App\Models\Admin\BookModel;

use App\Models\Admin\UserModel;


use Faker\Generator as Faker;

    

$factory->define(UserModel::class, function (Faker $faker) {
    return [
        'firstname'     =>$faker->name(),
        'lastname'      =>$faker->name(),
        'email'         =>$faker->email(),
        'mobile'        =>$faker->numerify('##########'),
        // 'address'       =>$faker->address(),
        // 'postcode'      =>$faker->numberBetween(360001,3600200),
        // 'city'          =>$faker->randomElement(['Rajkot', 'Ahmedabad','Jamnagar','Surat','Vadodara']),
        // 'state'         =>$faker->randomElement(['Gujarat']),
        // 'country'       =>$faker->randomElement(['India']),
        'password'       =>$faker->password(),
        
    ];
});
