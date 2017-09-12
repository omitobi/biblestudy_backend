<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        {

            $user = \App\User::first();
            $user->groups()->create([
                'name' => 'General',
                'description' => 'Bible Study',
                'logo' => '',
                'background_img' => '',
            ]);
        }
        Model::reguard();
    }
}
