<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    /*
     * Обновляет метку времени в дочерней таблице при измении родительской записи
     */
    protected $touches = ['users'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

}
