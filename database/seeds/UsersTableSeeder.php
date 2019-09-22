<?php

use App\Address;
use App\User;
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
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
        ])->address()->save(factory(Address::class)->make());

        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
        ])->address()->save(factory(Address::class)->make());

        factory(User::class,8)->create()->each(function(User $user){
            $user->address()->save(factory(Address::class)->make());
        });
    }
}
