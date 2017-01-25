<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Animal extends Model
{
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}
	public function images()
	{
		return $this->hasOne('App\Images');
	}

	public function editAnimal(Request $request, $id)
	{
		
		if ($request->input('body.name') !== null) {
			$this->name = $request->input('body.name');
		}
		if ($request->input('body.years') !== null) {
			$this->years = $request->input('body.years');
		}
		if ($request->input('body.months') !== null) {
			$this->months = $request->input('body.months');
		}
		if ($request->input('body.description') !== null) {
			$this->description = $request->input('body.description');
		}
		if ($request->input('body.vaccinated') === 'true') {
			$this->vaccinated = true;
		} else {
			$this->vaccinated = false;
		}
		if ($request->input('body.castrated') === 'true') {
			$this->castrated = true;
		} else {
			$this->castrated = false;
		}
		if ($request->input('body.dewormed') === 'true') {
			$this->dewormed = true;
		} else {
			$this->dewormed = false;
		}
		
	}

	protected $fillable = ['name', 'description', 'gender', 'animalType', 'image'];
}
