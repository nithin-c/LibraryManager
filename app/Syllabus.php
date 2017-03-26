<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model {

	public function subjects() {
		return $this->hasMany('App\Subject');
	}
}
