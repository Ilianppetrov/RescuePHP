<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnimalController extends Controller
{

    public function animalProfile($id)
    {
        $animal = Animal::where('id', $id)->first();
        return view('animals.animal-profile', compact('animal'));
    }

    public function getAddAnimal()
    {
    	return view('animals.animal-add');
    }

    public function postAddAnimal(Request $request)
    {
    	$this->validate($request, [
            'gender' => 'required',
            'animalType' => 'required',
            'name' => 'required',
            'years' => 'required_without:months',
            'months' => 'required_without:years',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000'
            ]);

    	$animal = new Animal($request->except('image'));
    	$image = $request->image;
    	if ($image){
           $imageName = $request->user()->id . '-' . date('d n y') . '-' . $image->getClientOriginalName();
           $image->move('images', $imageName);
       };
       $animal->image = $imageName;
       $request->user()->animals()->save($animal);
       $animal->years = $request['years'] ? $request['years'] : 0;
       $animal->months = $request['months'] ? $request['months'] : 0;
       if ($request['dewormed']) {
        $animal->dewormed = true;
    }
    if ($request['castrated']) {
        $animal->castrated = true;
    }
    if ($request['vaccinated']) {
        $animal->vaccinated = true;
    }
    $animal->save();

    $request->session()->flash('alert-success', 'Animal successfully added.');
    return redirect()->route('home');
}

public function getEditAnimal($id)
{
    $animal = Animal::where('id', $id)->first();
    $images = Images::where('animal_id', $id)->first();
    return view('animals.animal-edit', compact('animal', 'images'));
}

public function postEditAnimal(Request $request, $id)
{
    $animal = Animal::where('id', $id)->first();
    $animal->editAnimal($request, $id);
    $animal->save();

}
public function postDeleteAnimal(Request $request, $id)
{   
    $animal = Animal::where('id', $id)->first();
    File::delete('images/' . $animal->image);
    $image = Images::where('animal_id', $id)->first();
    $imgs = ['one','two', 'three', 'four', 'five', 'six'];
    foreach ($imgs as $img) {
        if (!is_null($image->$img)) {
            File::delete('images/' . $image->$img);
        }
    }
    $animal->delete();
    $image->delete();
    $request->session()->flash('alert-success', 'Animal deleted.');
    return redirect()->route('user.animals');
}


}
