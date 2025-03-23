<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class MeAndMyTodos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $me = User::factory()->create([
            "name" => "Keiner",
            "email" => "keinermendoza@gmail.com",
        ]);

        Todo::factory(10)->create([
            "user_id" => $me->id
        ]);

        $me->assignRole("admin");

    }
}
