<?php

namespace App\Domain\Entities;

use Illuminate\Auth\MustVerifyEmail;
use Bifrost\Entities\User as BaseUser;
use Illuminate\Notifications\Notifiable;
use App\Domain\Scopes\UserVisibilityScope;

class User extends BaseUser
{

  use MustVerifyEmail, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The "booting" method of the model.
   *
   * @return void
   */
  protected static function boot()
  {
    parent::boot();

    static::addGlobalScope(new UserVisibilityScope);
  }

  /**
   * Get the roles for the user.
   */
  public function roles()
  {
    return $this->belongsToMany(Role::class, 'users_roles');
  }

  /**
   * Get the permissions for the users.
   */
  public function permissions()
  {
    return $this->belongsToMany(Permission::class, 'users_permissions');
  }

}
