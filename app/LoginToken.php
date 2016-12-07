<?php

namespace App;
use App\Mail\LoginMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;


class LoginToken extends Model
{
    /**
     * Fillable fields for the model.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'token','remember'];
    /**
     * Generate a new token for the given user.
     *
     * @param  User $user
     * @return $this
     */
    public static function generateFor(User $user,$remember)
    {
        return static::create([
            'user_id' => $user->id,
            'token'   => str_random(50),
            'remember' => $remember
        ]);
    }
    /**
     * Get the route key for implicit model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'token';
    }
    /**
     * Send the token to the user.
     */
    public function send()
    {
        Mail::to($this->user)->send(new LoginMail($this));
    }
    /**
     * A token belongs to a registered user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
