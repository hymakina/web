<?php

use Illuminate\Database\Seeder;
use App\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Admin::create(['name' => 'Kemal Sami', 'email' => 'kskaraca@gmail.com', 'password' => bcrypt('kskaraca')]);
    }
}
