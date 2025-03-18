<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DgeAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Agent DGE',
            'email' => 'agent.dge@example.com',
            'password' => Hash::make('password'), // Changez le mot de passe selon vos besoins
            'role' => 'agentdge',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
