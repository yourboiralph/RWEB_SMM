<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'issued_by',
        'client_id',
        'description',
        'target_date',
        'status',
    ];

    /**
     * Get the user who issued the project.
     */
    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }

    /**
     * Get the client associated with the project.
     */
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    /**
     * Get the jobs associated with the project.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
