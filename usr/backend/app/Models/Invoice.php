<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'invoice_number',
        'issue_date',
        'total_amount',
        'tax_amount',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
