<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model {

	public function users() {
		return $this->hasMany('App\User');
	}
	public function teachers() {
		return $this->hasMany('App\Teacher');
	}
	public function classes() {
		return $this->hasMany('App\Clas');
	}
}
