<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasDatabaseNotifications;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
    ];

    /**
     * The attributes that should be hidden for arr
     *
     *
     *
     *
     * ays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        return $this->belongsToMany(Role::class);
    }

    public function entries()
    {
        return $this->belongsToMany(Entry::class)
            ->as('grade')
            ->withPivot('score')
            ->withTimestamps();
    }

    public function getAbilitiesAttribute(): array
    {
        $roles = [];

        foreach ($this->roles as $role) {
            array_push($roles, $role->id);
        }

        return $roles;
    }
}
