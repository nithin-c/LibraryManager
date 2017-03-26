<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class DatatableCategoryController extends Controller {

	public function index(Request $request) {
		$category = Category::latest()->paginate(5);

		$response = [
			'pagination' => [
				'total' => $category->total(),
				'per_page' => $category->perPage(),
				'current_page' => $category->currentPage(),
				'last_page' => $category->lastPage(),
				'from' => $category->firstItem(),
				'to' => $category->lastItem(),
			],
			'data' => $category,
		];

		return response()->json($response);
	}
}
