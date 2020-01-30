<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
         'plan_id', 'name', 'lesson_text'
    ];

    public function plans()
    {
        return $this->belongsTo(Plan::class);
    }

    public function setLessonTextAttribute($value)
    {
        if($value){
            $this->attributes['lesson_text'] = str_replace( '&', '&amp;', $value );
        }
    }
}
