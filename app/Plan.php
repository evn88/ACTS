<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_plan');
    }
}
