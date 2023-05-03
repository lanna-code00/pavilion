<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints(); //removes foreign key constraint because I used it in the email_audit_log table
        DB::table('users')->truncate(); //you can comment it out, if it's not need
        User::factory()
                        ->count(10) //generated 20 users
                        ->create();
    }
}
