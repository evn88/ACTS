<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'plan_id', 'name', 'question', 'answer'
    ];

    public function plans()
    {
        return $this->belongsTo(Plan::class);
    }

    public function useranswers()
    {
        return $this->hasMany(Useranswer::class);
    }
}
