<?php

use App\Address;
use App\User;
use Artesaos\Defender\Role;
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
        factory(User::class, 1)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
        ])->each(function(User $user){
            $user->address()->save(factory(Address::class)->make(['number' => '2222222']));
            $user->roles()->save(factory(Role::class)->make());
        });


        factory(User::class, 1)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
        ])->each(function(User $u){
            $u->address()->save(factory(Address::class)->make(['number' => '3333333']));
            $u->roles()->save(factory(Role::class)->make(['name' => 'User']));
        });

        factory(User::class,8)->create()->each(function(User $user){
            $user->address()->save(factory(Address::class)->make());
        });
    }
}
