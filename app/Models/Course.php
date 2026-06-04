<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'code',
        'description',
        'status',
        'credits',
    ];

    protected function casts(): array
    {
        return [
            'credits' => 'integer',
        ];
    }

    // ──────────────────────────────────────────
    // Relationships  (expanded in Phase 4)
    // ──────────────────────────────────────────

    /** The instructor who owns this course */
    public function instructor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ──────────────────────────────────────────
    // Scopes  (expanded in Phase 4)
    // ──────────────────────────────────────────

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', 'draft');
    }

    public function scopeForInstructor(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    // ──────────────────────────────────────────
    // Accessors / Mutators
    // ──────────────────────────────────────────

    /** Display-friendly status label */
    public function getStatusLabelAttribute(): string
    {
        return ucfirst($this->status);
    }

    /** Uppercase the course code before saving */
    public function setCodeAttribute(string $value): void
    {
        $this->attributes['code'] = strtoupper($value);
    }
}
