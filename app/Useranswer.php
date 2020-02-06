<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useranswer extends Model
{
    protected $fillable = [
        'test_id', 'user_id', 'answers', 'ip'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
