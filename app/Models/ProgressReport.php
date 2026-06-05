<?php
// app/Models/ProgressReport.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'average_grade',
        'completed_items',
        'generated_at',
    ];

    protected function casts(): array
    {
        return [
            'generated_at'  => 'datetime',
            'average_grade' => 'decimal:2',
        ];
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // Accessor — human readable performance label
    public function getPerformanceLabelAttribute(): string
    {
        return match(true) {
            $this->average_grade >= 75 => 'Excellent',
            $this->average_grade >= 65 => 'Good',
            $this->average_grade >= 55 => 'Average',
            $this->average_grade >= 45 => 'Below average',
            default                    => 'At risk',
        };
    }

    // Accessor — badge color for the label
    public function getPerformanceColorAttribute(): string
    {
        return match(true) {
            $this->average_grade >= 75 => 'green',
            $this->average_grade >= 55 => 'yellow',
            default                    => 'red',
        };
    }
}