<?php

namespace App\Http\Controllers;
use App\Author;
use App\Book;
use App\Category;
use App\Publisher;
use App\User;
use Auth;
use Illuminate\Http\Request;
use View;

class BookController extends Controller {
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
		return view('book.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function update(Request $request) {
		try {

			$book = Book::find($request->input('id'));
			$book->name = $request->input('name');
			$book->save();
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

			$book = new Book();
			$book->name = $request->input('name');
			$book->isbn = $request->input('isbn');

			/* AUTHOR LINK */
			@$isIntegerAuthor = is_int(json_decode($request->input('author')));

			/** if
			author value is integer then get existing author id
			else
			create new author and get id
			 */

			if (@$isIntegerAuthor) {
				@$author = Author::find($request->input('author'));

				if (count(@$author) > 0) {
					@$book->author_id = @$author->id;
				} else {
					@$createNewAuthor = 1;
				}
			} else {
				@$createNewAuthor = 1;
			}

			if (@$createNewAuthor == 1) {
				@$author = new Author();
				@$author->name = $request->input('author');
				@$author->save();

				@$book->author_id = @$author->id;
			}

			/* PUBLISHER LINK */
			@$isIntegerPublisher = is_int(json_decode($request->input('publisher')));

			/** if
			author value is integer then get existing author id
			else
			create new author and get id
			 */

			if (@$isIntegerPublisher) {
				@$publisher = Publisher::find($request->input('publisher'));

				if (count(@$publisher) > 0) {
					@$book->publisher_id = @$publisher->id;
				} else {
					@$createNewPublisher = 1;
				}
			} else {
				@$createNewPublisher = 1;
			}

			if (@$createNewPublisher == 1) {
				@$publisher = new Publisher();
				@$publisher->name = $request->input('publisher');
				@$publisher->save();

				@$book->publisher_id = @$publisher->id;
			}

			@$book->count = $request->input('count');
			@$book->save();

			/*Category Link*/
			@$category = Category::find($request->input('categoryId'));

			@$checkCategory = @$category->book()
				->where('books.deleted_at', '=', '0000-00-00 00:00:00')
				->where('books.id', '=', @$book->id)
				->first();

			//if not linked category already
			if (count(@$checkCategory) == 0) {
				@$category->book()->attach($book);
			}

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
		Book::find($id)->delete();
		return response()->json(['done']);
	}

}
