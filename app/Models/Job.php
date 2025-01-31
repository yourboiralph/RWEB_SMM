<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'worked_by',
        'issued_by',
        'job_name',
        'description',
        'target_date',
        'signature_admin',
        'signature_top_manager',
        'status',
    ];

    /**
     * Get the project that owns the job.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user who worked on the job.
     */
    public function workedBy()
    {
        return $this->belongsTo(User::class, 'worked_by');
    }

    /**
     * Get the user who issued the job.
     */
    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}
