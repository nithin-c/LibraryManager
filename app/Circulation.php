<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circulation extends Model {

	public function book() {
		return $this->belongsTo('App\Book');
	}

	public function person() {
		return $this->belongsTo('App\Person');
	}
}
