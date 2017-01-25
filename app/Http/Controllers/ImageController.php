<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
	public function postUploadImages(Request $request, $id)
	{
		$imgs = ['one','two', 'three', 'four', 'five', 'six'];

		$images = $request->images;
		if (Images::where('animal_id', $id)->first()) {
			$exist = Images::where('animal_id', $id)->first();
			for ($i=0; $i <= 5; $i++) { 
				$current = $imgs[$i];
				if (is_null($exist->$current)) {
					$max = $i;
					break;
				} else {
					$max = $i + 1;
				} 
			}
			if ($max + count($images) > 6) {
				$request->session()->flash('alert-warning', 'You can add up to 6 images.');
				return redirect()->back();
			}

			foreach ($images as $image) {
				$imageName = $max . '-' . time() . '-' . $image->getClientOriginalName();
				$image->move('images', $imageName);
				$curr = $imgs[$max];
				$exist->$curr = $imageName;
				$max++;
			}

			$exist->save();
			$request->session()->flash('alert-success', 'Images have been added.');
			return redirect()->back();

		} 

		$newImages = new Images;
		$newImages->animal_id = $id;
		$y = 0;
		foreach($images as $image) {
			$current = $imgs[$y];
			$imageName = $y . '-' . time() . '-' . $image->getClientOriginalName();
			$image->move('images', $imageName);
			$newImages->$current = $imageName;
			$y++;
		}
		$newImages->save();
		$request->session()->flash('alert-success', 'Images have been added.');
		return redirect()->back();
	}

	public function deleteImage(Request $request, $id)
	{
		$image = Images::where('animal_id', $id)->first();
		$imageNumber = $request['body'];
		$imageToDelete = $image->$imageNumber;
		File::delete('images/' . $imageToDelete);
		$image->$imageNumber = null;
		$image->save();
		return response()->json(['msg' => $imageToDelete]);
	}

	public function defaultImage(Request $request, $id)
	{
		$image = Images::where('animal_id', $id)->first();
		$animal = Animal::where('id', $id)->first();
		$imageNumber = $request['body'];
		$tempVariable = $animal->image;
		$animal->image = $image->$imageNumber;
		$image->$imageNumber = $tempVariable;
		$image->save();
		$animal->save();
	}
}
