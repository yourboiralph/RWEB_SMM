<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'job_name',
        'description',
        'target_date',
        'status',
    ];

    /**
     * Get the project that owns the job.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
