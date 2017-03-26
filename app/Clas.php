<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model {
	public function organization() {
		return $this->belongsTo('App\Organization');
	}

	public function subjects() {
		return $this->belongsToMany('App\Subject');
	}

	public function students() {
		return $this->hasMany('App\Student');
	}
}
