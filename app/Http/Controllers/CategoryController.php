<?php

namespace App\Http\Controllers;
use App\Category;
use App\User;
use Auth;
use Illuminate\Http\Request;
use View;

class CategoryController extends Controller {

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

		return view('book_category.index');

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function create() {

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function show($id) {
		return view('book.index')->with('categoryId', $id);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function update(Request $request) {
		try {

			$category = Category::find($request->input('id'));
			$category->name = $request->input('name');
			$category->save();
			$response = array('success' => true);

		} catch (Exception $e) {
			$response = array('error' => true);
		}

		return response()->json($response);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function store(Request $request) {
		try {

			$category = new Category();
			$category->name = $request->input('name');
			$category->save();
			$response = array('success' => true);

		} catch (Exception $e) {
			$response = array('error' => true);
		}

		return response()->json($response);

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function destroy($id) {
		Category::find($id)->delete();
		return response()->json(['done']);
	}
}
