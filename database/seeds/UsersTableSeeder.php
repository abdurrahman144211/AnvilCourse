<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrators = [
            [
                'name' => 'Abdurrahman Faid',
                'email' => 'abdurrahman144211@gmail.com',
                'password' => bcrypt('password'),
                'phone' => '+201064037783',
                'phone_verified' => true,
                'role' => 'administrator',
            ]
        ];

        foreach ($administrators as $administrator) {
            $administrator = \App\Models\User::forceCreate($administrator);
            $administrator->instructorProfile()->create(['job_title' => 'Software Engineer']);
        }
    }
}
