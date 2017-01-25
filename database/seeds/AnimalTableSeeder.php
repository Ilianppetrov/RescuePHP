<?php

use App\Animal;
use Illuminate\Database\Seeder;
use App\User;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$animal_user = User::where('username', 'Admin')->first();
        $animal = new Animal();
        $animal->name = 'Choki';
        $animal->imagePath = 'dawdwa';
        $animal->years = 2;
        $animal->months = 2;
        $animal->description = 'dawdawdawdawdaw';
        $animal->animalType = 'Cat';
        $animal->gender = 'male';
        $animal_user->animals()->save($animal);
        $animal->save();

        $animal_user = User::where('username', 'User')->first();
        $animal = new Animal();
        $animal->name = 'Debel';
        $animal->imagePath = 'dawdwa';
        $animal->years = 2;
        $animal->months = 2;
        $animal->description = 'dawdawdawdawdaw';
        $animal->animalType = 'Cat';
        $animal->gender = 'female';
        $animal_user->animals()->save($animal);
        $animal->save();
    }
}
