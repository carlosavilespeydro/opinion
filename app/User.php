<?php

namespace opinion;

use Illuminate\Foundation\Auth\User as Authenticatable;
use opinion\proposal;



class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function proposal()
    {
        return $this->hasMany(\opinion\proposal::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'Author_id');
    }
}
