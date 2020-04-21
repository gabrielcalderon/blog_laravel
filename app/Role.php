<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
  protected $fillable = [
    'name',
    'default',
    'permissions'
  ];

  public function users(){
    return $this->hasOne(User::class);
  }
  /**
  * @method generate_roles
  */
  public static function generate_roles(){
    $roles = [
      'User' => [true,Permissions::FOLLOWER | Permissions::USER],
      'Admin' => [false,Permissions::ADMINISTER | Permissions::MODERATOR_COMMENTS],
    ];
    foreach ($roles as $role => $permission) {
      static::create([
          'name' => $role,
          'default' => $permission[0],
          'permissions' => $permission[1],
      ]);
    }
  }
}

class Permissions {
  const ADMINISTER = 0xff;
  const FOLLOWER = 0x02;
  const MODERATOR_COMMENTS = 0x17;
  const USER = 0x01;
}
