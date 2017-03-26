<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model {

	public function subjects() {
		return $this->belongsTo('App\Subject');
	}

	public function topics() {
		return $this->hasMany('App\Topic');
	}
}
