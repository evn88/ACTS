<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attack extends Model
{
    public function plans()
    {
        return $this->belongsTo(Plan::class);
    }
}
