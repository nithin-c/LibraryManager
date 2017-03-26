<?php

namespace App\Http\Controllers;
use App\Circulation;
use App\User;
use Auth;
use Carbon;
use Illuminate\Http\Request;
use View;

class CirculationController extends Controller {

	function __construct() {
		$this->middleware(function ($request, $next) {
			$this->user = User::find(Auth::id());

			View::share('thisUser', @$this->user);
			View::share('userId', $this->user->id);
			View::share('user', $this->user->name);
			View::share('username', $this->user->username);

			return $next($request);
		});

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return view
	 */
	public function index() {
		return view('circulation.index');
	}

	public function store(Request $request) {
		try {
			@$circulation = new Circulation();

			@$circulation->book_id = $request->input('isbn');
			@$circulation->person_id = $request->input('personId');

			@$circulation->issue_date = Carbon\Carbon::createFromFormat('d-m-Y', $request->input('issueDate'))->format('Y-m-d');
			@$circulation->due_date = Carbon\Carbon::createFromFormat('d-m-Y', $request->input('dueDate'))->format('Y-m-d');

			@$circulation->save();
			$response = array('success' => true);
		} catch (Exception $e) {
			$response = array('error' => true);
		}
		return response()->json($response);
	}
}
