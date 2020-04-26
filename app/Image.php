<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Image extends Model
{
    protected $fillable = [
        'ruta',
    ];

    protected $casts = [
        'ruta' => 'string',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
		}
		
}