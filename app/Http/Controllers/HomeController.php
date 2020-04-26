<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{	

	public function __invoke(Request $request)
	{
		if ($request->session()) {
			return view('home')->with('success', 'Welcome!!');
		}	
	}
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
			$this->middleware('auth');
	}
}
