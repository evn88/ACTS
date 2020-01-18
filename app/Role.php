<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    protected $touches = ['users'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

}
