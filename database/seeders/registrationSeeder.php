<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Str;

use Faker\Factory as Faker;

use Carbon\Carbon;

class registrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
        DB::table('registration')->insert([
        'first_name'     => $faker->firstName(),
        'last_name'     => $faker->lastName,
        'email'     => $faker->email,
        'password'     => bcrypt($faker->password(6)),
        'country'=>$faker->country,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    
    }
    }
}
