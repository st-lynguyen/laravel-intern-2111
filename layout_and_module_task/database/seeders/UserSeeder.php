<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            $userID = DB::table('users')->insertGetId([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
            ]);
            $tasks = rand(1, 4);
            for ($j = 0; $j < $tasks; $j++) {
                $dayCount = rand(1, 5);
                $start_date = date(now());
                $new_date = strtotime('+' . $dayCount . ' days', strtotime($start_date));
                $due_date = date('Y-m-d', $new_date);
                DB::table('tasks')->insert([
                    'title' => $faker->realText($faker->numberBetween(10, 20)),
                    'description' => $faker->realText($faker->numberBetween(100, 300)),
                    'type' => $faker->numberBetween(1, 2),
                    'status' => $faker->numberBetween(1, 2),
                    'start_date' => $start_date,
                    'due_date' => $due_date,
                    'assignee' => $userID,
                    'estimate' => $faker->randomFloat(1, 1, $dayCount),
                    'actual' => $faker->randomFloat(1, 1, 8),
                ]);
            }
        }
    }
}
