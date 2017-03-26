<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

	public function chapters() {
		return $this->belongsTo('App\Chapter');
	}

	public function questions() {
		return $this->belongsToMany('App\Question');
	}
}
