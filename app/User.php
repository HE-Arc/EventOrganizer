<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function adminOf(){
        return $this->hasMany('App\Event');
    }

    /**
     * Retrieve a user by their email address.
     *
     * @param  string $email
     * @return $this
     */
    public static function byEmail($email)
    {
        return static::where('email', $email);
    }

    public function participants(){
        return $this->hasMany('App\Participant');
    }


    public function events(){
        return $this->belongsToMany('App\Event','participants');
    }

    public function tokens(){
        return $this->hasMany(LoginToken::class);
    }

    /**
     * Returns the name if not empty,
     * or the email name if the name is empty
     * @return mixed
     */
    public function getIdentity(){
        if($this->name === ""){
            return explode('@', $this->email)[0];
        }else{
            return $this->name;
        }
    }

}
