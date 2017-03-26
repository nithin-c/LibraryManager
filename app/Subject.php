<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

	public function chapters() {
		return $this->hasMany('App\Chapter');
	}

	public function syllabus() {
		return $this->belongsTo('App\Syllabi');
	}

	public function teachers() {
		return $this->belongsToMany('App\Teacher');
	}

	public function classes() {
		return $this->belongsToMany('App\Clas');
	}
}
