<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{User, Image};

class Post extends Model
{
	protected $fillable = [
		'title',
		'body',
		'image_id',
		'author',
	];

	protected $casts = [
		'title' => 'string',
		'body' => 'text',
		'image_id' => 'integer',
		'author' => 'integer'
	];

	public function author()
	{
		return $this->belongsTo(User::class);;
	}

	public function image()
	{
		return $this->belongsTo(Image::class);;
	}
}
