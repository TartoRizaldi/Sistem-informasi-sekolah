<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Siswa::class, function (Faker $faker) {
    return [ 
    	'user_id' => 100,
        'nama_depan' => $faker->name,
        'nama_belakang' => '',
        'jenis_kelamin' => $faker->randomElement(['L','P']),
        'agama' => $faker->randomElement(['Islam','Kristen','Hindu','Budha']),
        'alamat' => $faker->address,
   ];
});
