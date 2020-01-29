<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attack extends Model
{
    protected $fillable = [
        'plan_id', 'name', 'mail_template'
    ];

    public function plans()
    {
        return $this->belongsTo(Plan::class);
    }
}
