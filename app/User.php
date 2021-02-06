<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

       protected $guard='web';
    /**

     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userhacker()
       {
         return $this->hasOne(UserHacker::class);
       }

    public function userbusiness()
       {
         return $this->hasOne(UserBusiness::class);
       }   
    public function post()
       {
        return $this->hasMany(Post::class);
       }
    public function bounty()
       {
         return $this->hasMany(bounty::class);
       }

      public function reports()
      {
        return   $this->hasMany(Report::class,'sender_hacker_user_id');
      }
}
