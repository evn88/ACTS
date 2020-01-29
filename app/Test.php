<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function plans()
    {
        return $this->belongsTo(Plan::class);
    }
}
