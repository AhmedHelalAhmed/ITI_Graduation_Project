<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hootlex\Friendships\Traits\Friendable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use Notifiable, HasRoles ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    /**
     * Return the user attributes.
     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'url' => '',  // Optional
            'avatar' => 'gravatar',  // Default avatar
            'admin' => $user->role === 'admin', // bool
        ];
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }


    use Friendable;
}
