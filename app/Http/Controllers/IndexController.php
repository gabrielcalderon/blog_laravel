<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function __invoke()
	{

		$posts = [
			[
				'title' => 'Post1',
				'body' => 'Este es el contenido de mi Post1',
				'author' => 'Jose Gabriel'
			],

			[
				'title' => 'Post2',
				'body' => 'Este es el contenido de mi Post2',
				'author' => 'Jose Gabriel'
			],

			[
				'title' => 'Post3',
				'body' => 'Este es el contenido de mi Post3',
				'author' => 'Jose Gabriel'
			],

			[
				'title' => 'Post4',
				'body' => 'Este es el contenido de mi Post4',
				'author' => 'Jose Gabriel'
			],
		];
		return view('welcome', \compact('posts'));
	}
}
