<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
	public function category() {
		return $this->belongsToMany('App\Category');
	}

	public function author() {
		return $this->belongsTo('App\Author');
	}

	public function publisher() {
		return $this->belongsTo('App\Publisher');
	}

	public function circulation() {
		return $this->hasMany('App\Circulation');
	}
}
