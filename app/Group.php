<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Group extends Model
{
    protected $fillable = [
        'name', 'date_start', 'date_end', 'status'
    ];

    public function setDateStartAttribute($value)
    {
        if($value){
            $this->attributes['date_start'] = Carbon::createFromFormat('d.m.Y H:i', $value)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_start'] = null;
        }
    }

    public function setDateEndAttribute($value)
    {
        if($value){
            $this->attributes['date_end'] = Carbon::createFromFormat('d.m.Y H:i', $value)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_end'] = null;
        }
    }

    public function getDateStartAttribute($value)
    {
        if($value){
            return Carbon::parse($value)->format('d.m.Y H:i');
        }
    }
    public function getDateEndAttribute($value)
    {
        if($value){
            return Carbon::parse($value)->format('d.m.Y H:i');
        }
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    public function usersCount()
    {
        return $this->users()->count();
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'group_plan');
    }

    public function inPlan($id)
    {
        return $this->plans()->where('id', $id)->count() == 1;
    }
}
