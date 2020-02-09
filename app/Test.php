<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'plan_id', 'name', 'question', 'answer'
    ];
    protected $hidden = ['trueAnswer'];

    public function plans()
    {
        return $this->belongsTo(Plan::class);
    }

    public function useranswers()
    {
        return $this->hasMany(Useranswer::class);
    }

    public function scopeTrueanswer($query, $plan_id)
    {
        $this->setVisible(['trueAnswer']);
        $result = $this->where('plan_id', $plan_id)->trueanswer()->join('useranswers', 'tests.id', '=', 'useranswers.test_id');
        return $result;
    }
}
