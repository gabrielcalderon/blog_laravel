<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Image;

class Profile extends Model
{
		protected $fillable = [
			'direccion',
			'historial',
			'user_id',
			'image_id'
		];

    public function user()
    {
      return $this->belongsTo(User::class);
		}

		public function image()
		{
			return $this->belongsTo(Image::class);
		}

}
