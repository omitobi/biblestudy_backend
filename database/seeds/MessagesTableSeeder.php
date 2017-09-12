<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MessagesTableSeeder extends Seeder
{

    protected $faker;
    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $group = \App\Group::first();

        foreach (['1','2'] as $item) {
            \App\User::all()->each(function ($user) use ($group){
                $user->messages()->create([
                    'group_id' => $group->id,
                    'body' => $this->faker->realText()
                ]);
            });
        }

        Model::reguard();
    }
}
