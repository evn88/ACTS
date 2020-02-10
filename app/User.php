<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //TODO: Удалить из видимости пароль
    protected $fillable = [
        'name', 'email', 'password', 'profession'
    ];

//    protected $touches = ['roles','groups'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * add custom attribute
     * @var array
     */
    protected $appends = [
        'lessons_count','tests_count','tests_passed','tests_failed','attacks_failed','percent_pass'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    public function useranswers()
    {
        return $this->hasMany(Useranswer::class);
    }

    public function inGroup($groupId)
    {
        return $this->groups()->where('id', $groupId)->count() == 1;
    }


    public function isAdmin() {
        foreach($this->roles as $role) {
            return $this->inRole('admin');
        }
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
