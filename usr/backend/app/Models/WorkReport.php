<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'report_date',
        'worker_name',
        'work_details',
        'hours_worked',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
