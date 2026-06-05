<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Enrolment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'grade',
        'enrolled_at',
    ];

    protected function casts(): array
    {
        return [
            'grade'       => 'decimal:2',
            'enrolled_at' => 'datetime',
        ];
    }
    // Add to app/Models/Enrolment.php
    public function grades(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Grade::class);
    }

// Accessor — average score across all grades for this enrolment
    public function getAverageScoreAttribute(): float
    {
        if ($this->grades->isEmpty()) return 0;
        return round(
            $this->grades->sum('score') / $this->grades->sum('max_score') * 100,
            1
        );
    }

    // ──────────────────────────────────────────
    // Relationships
    // ──────────────────────────────────────────

    /** The student who enrolled */
    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** The course this enrolment belongs to */
    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // ──────────────────────────────────────────
    // Scopes
    // ──────────────────────────────────────────

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    public function scopeForStudent(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    public function scopeForCourse(Builder $query, int $courseId): Builder
    {
        return $query->where('course_id', $courseId);
    }

    // ──────────────────────────────────────────
    // Accessors / Mutators
    // ──────────────────────────────────────────

    /** Human-readable status label */
    public function getStatusLabelAttribute(): string
    {
        return ucfirst($this->status);
    }

    /** Letter grade derived from numeric grade */
    public function getLetterGradeAttribute(): ?string
    {
        if ($this->grade === null) {
            return null;
        }

        return match(true) {
            $this->grade >= 75 => 'A',
            $this->grade >= 60 => 'B',
            $this->grade >= 50 => 'C',
            $this->grade >= 40 => 'D',
            default            => 'F',
        };
    }

    // ──────────────────────────────────────────
    // Events (boot)
    // ──────────────────────────────────────────

    protected static function boot(): void
    {
        parent::boot();

        // Automatically stamp enrolled_at when creating
        static::creating(function (Enrolment $enrolment) {
            $enrolment->enrolled_at ??= now();
        });
    }
}
