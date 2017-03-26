<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

	public function organization() {
		return $this->belongsTo('App\Organization');
	}

	public function subjects() {
		return $this->belongsToMany('App\Subject');
	}
}
