<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model {

	public function users() {
		return $this->belongsTo('App\User');
	}
}
