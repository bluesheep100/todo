<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\TodoItem;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        TodoList::factory(5)->create();
        TodoItem::factory(10)->create();
        Role::factory()->create(['name' => 'admin']);

        // Create an administrator
        $user = User::factory()->create(['name' => 'admin', 'email' => 'admin@example.com']);
        $user->roles()->sync(Role::where('name', 'admin')->first()->id);
    }
}
