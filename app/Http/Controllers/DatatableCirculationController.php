<?php

namespace App\Http\Controllers;
use App\Circulation;
use Illuminate\Http\Request;

class DatatableCirculationController extends Controller {

	public function index(Request $request) {
		$circulation = Circulation::latest()->paginate(5);

		$response = [
			'pagination' => [
				'total' => $circulation->total(),
				'per_page' => $circulation->perPage(),
				'current_page' => $circulation->currentPage(),
				'last_page' => $circulation->lastPage(),
				'from' => $circulation->firstItem(),
				'to' => $circulation->lastItem(),
			],
			'data' => $circulation,
		];

		return response()->json($response);
	}
}
