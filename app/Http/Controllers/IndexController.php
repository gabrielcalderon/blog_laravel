<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
	public function __invoke()
	{

		$posts = [
			[
				'title' => 'Post1',
				'body' => 'Este es el contenido de mi Post1'
			],

			[
				'title' => 'Post2',
				'body' => 'Este es el contenido de mi Post2'
			],

			[
				'title' => 'Post3',
				'body' => 'Este es el contenido de mi Post3'
			],

			[
				'title' => 'Post4',
				'body' => 'Este es el contenido de mi Post4'
			],
		];
		return view('welcome', compact('posts'));
	}
}
