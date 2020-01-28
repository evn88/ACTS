<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'img'
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_plan');
    }
}
