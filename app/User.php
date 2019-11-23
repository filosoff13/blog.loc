<?php

namespace App;

use function App\Helpers\customFormatDate;
use App\Models\User as InterfaceUser;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements InterfaceUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * Implementation of interface method
     *
     * @param int $number
     */
    function generate(int $number): void  {
        //
    }

    /**
     * Return posts of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Return comments of posts of user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Return full name of user
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name. ' ' . $this->last_name;
    }

    /**
     * Return DATE in format "1 Серпня 2019, 10:10"
     * @return string
     */
    public function getCreatedAtUserAttribute()
    {
        return customFormatDate($this->created_at);
    }
}
