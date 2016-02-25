<?php

use Illuminate\Database\Seeder;
use opinion\proposal;
use opinion\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        proposal::truncate();

        factory(opinion\User::class, 30)->create()->each(function ($user) {
            $proposal = factory(proposal::class)->make();
            $user->proposal()->save($proposal);
        });
    }
}
