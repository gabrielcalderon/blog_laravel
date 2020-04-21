<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Image extends Model
{
    protected $fillable = [
        'ruta',
        'slug'
    ];

    protected $casts = [
        'ruta' => 'string',
        'slug' => 'string',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
