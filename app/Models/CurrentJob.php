<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentJob extends Model
{
    use HasFactory;

    protected $table = 'current_jobs';

    protected $fillable = [
        'name',
        'company_id',
        'salary_form',
        'salary_to',
        'experience',
        'gpa_from',
        'job_type',
        'category_id',
        'created_at'
    ];

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
