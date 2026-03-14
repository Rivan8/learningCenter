<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_type',
        'video_index',
        'progress_percentage',
        'current_time',
        'video_duration',
        'is_completed',
        'last_watched_at'
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'last_watched_at' => 'datetime',
        'current_time' => 'float',
        'progress_percentage' => 'integer',
        'video_duration' => 'float'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper method untuk mendapatkan progress user untuk video type tertentu
    public static function getUserProgress($userId, $videoType)
    {
        return self::where('user_id', $userId)
                   ->where('video_type', $videoType)
                   ->orderBy('video_index')
                   ->get();
    }

    // Helper method untuk update atau create progress
    public static function updateProgress($userId, $videoType, $videoIndex, $progressPercentage, $currentTime = 0, $videoDuration = null)
    {
        $isCompleted = $progressPercentage >= 100;

        return self::updateOrCreate(
            [
                'user_id' => $userId,
                'video_type' => $videoType,
                'video_index' => $videoIndex
            ],
            [
                'progress_percentage' => $progressPercentage,
                'current_time' => $currentTime,
                'video_duration' => $videoDuration,
                'is_completed' => $isCompleted,
                'last_watched_at' => now()
            ]
        );
    }
}
