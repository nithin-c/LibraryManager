<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class DatatableBookController extends Controller {

	public function index(Request $request) {
		$book = Book::latest()->paginate(5);

		$response = [
			'pagination' => [
				'total' => $book->total(),
				'per_page' => $book->perPage(),
				'current_page' => $book->currentPage(),
				'last_page' => $book->lastPage(),
				'from' => $book->firstItem(),
				'to' => $book->lastItem(),
			],
			'data' => $book,
		];

		return response()->json($response);
	}
}
