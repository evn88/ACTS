<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useranswer extends Model
{
    protected $fillable = [
        'test_id', 'user_id', 'answers', 'ip'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function tests()
    {
        return $this->belongsTo(Test::class);
    }
}
