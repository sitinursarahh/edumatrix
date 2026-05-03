<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProgress extends Model
{
    protected $table = 'user_progress';

    protected $fillable = [
        'user_id',
        'materi_slug',
        'sub_materi_slug',
        'unlocked',
        'completed'
    ];

    protected $casts = [
        'unlocked'  => 'boolean',
        'completed' => 'boolean',
    ];

    /**
     * Relasi ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: progress per materi
     */
    public function scopeMateri($query, $slug)
    {
        return $query->where('materi_slug', $slug);
    }

    /**
     * Helper: unlock sub materi
     */
    public static function unlock($userId, $materiSlug, $subSlug)
    {
        return self::updateOrCreate(
            [
                'user_id' => $userId,
                'materi_slug' => $materiSlug,
                'sub_materi_slug' => $subSlug,
            ],
            [
                'unlocked' => true,
            ]
        );
    }

    /**
     * Helper: mark completed
     */
    public static function complete($userId, $materiSlug, $subSlug)
    {
        return self::updateOrCreate(
            [
                'user_id' => $userId,
                'materi_slug' => $materiSlug,
                'sub_materi_slug' => $subSlug,
            ],
            [
                'unlocked'  => true,
                'completed' => true,
            ]
        );
    }
}
