<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'role',
        'phone',
        'image',
        'address',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the projects issued by this user.
     */
    public function issuedProjects()
    {
        return $this->hasMany(Project::class, 'issued_by');
    }

    /**
     * Get the projects where this user is the client.
     */
    public function clientProjects()
    {
        return $this->hasMany(Project::class, 'client_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'role');
    }
}
