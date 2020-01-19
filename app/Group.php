<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'date_start', 'date_emd', 'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }
}
