<?php

use Illuminate\Database\Seeder;

class AppSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AppSetting::create([
            'name' => 'Anvil Course',
            'short_overview' => 'An advanced courses for and advanced learner.',
        ]);
    }
}
