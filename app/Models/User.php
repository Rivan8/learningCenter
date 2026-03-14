<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'name',
        'email',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'password',
        'role',
        'statusanggota',
        'status',
        'photo',
        'statusnextstep',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
    
    /**
     * Get the video progress records for the user.
     */
    public function videoProgress()
    {
        return $this->hasMany(VideoProgress::class);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
    /**
     * Get the video progress percentage for a specific video type.
     * Calculates based on total watched time across all videos divided by total duration.
     *
     * @param string $videoType
     * @return int
     */
    public function getVideoProgressPercentage($videoType = 'why')
    {
        $progress = $this->videoProgress()
            ->where('video_type', $videoType)
            ->get();
            
        if ($progress->isEmpty()) {
            return 0;
        }
        
        // Check if all videos are completed
        $completedCount = $progress->where('is_completed', true)->count();
        $totalVideos = count($this->getAllVideoDurations($videoType));
        
        // If all videos are completed, return 100%
        if ($completedCount === $totalVideos) {
            return 100;
        }
        
        // Get all video durations (including those not watched yet)
        $allVideoDurations = $this->getAllVideoDurations($videoType);
        
        // Calculate total duration of all videos
        $totalDuration = array_sum($allVideoDurations);
        $totalWatchedDuration = 0;
        
        // Calculate watched duration
        foreach ($progress as $videoProgress) {
            $index = $videoProgress->video_index;
            $videoDuration = null;
            
            // Use stored video_duration if available
            if (!is_null($videoProgress->video_duration)) {
                // Convert seconds to minutes for calculation
                $videoDuration = $videoProgress->video_duration / 60;
            } else if (isset($allVideoDurations[$index])) {
                // Use fallback duration if stored duration is not available
                $videoDuration = $allVideoDurations[$index];
            } else {
                // Skip this video if no duration information is available
                continue;
            }
            
            $watchedDuration = ($videoProgress->progress_percentage / 100) * $videoDuration;
            $totalWatchedDuration += $watchedDuration;
        }
        
        // Calculate overall progress percentage
        $overallPercentage = ($totalDuration > 0) ? ($totalWatchedDuration / $totalDuration) * 100 : 0;
        
        return round($overallPercentage);
    }
    
    /**
     * Get all video durations for a specific video type.
     *
     * @param string $videoType
     * @return array
     */
    private function getAllVideoDurations($videoType = 'why')
    {
        // Fallback video durations in minutes
        $videoDurations = [
            // Adjust these values with actual video durations
            0 => 5,  // Video 1: 5 minutes
            1 => 3,  // Video 2: 3 minutes
            2 => 12, // Video 3: 12 minutes
            3 => 8,  // Video 4: 8 minutes
            4 => 6,  // Video 5: 6 minutes
            5 => 10, // Video 6: 10 minutes
            6 => 7,  // Video 7: 7 minutes
            7 => 9,  // Video 8: 9 minutes
            8 => 4,  // Video 9: 4 minutes
        ];
        
        // Try to get actual durations from database
        $storedDurations = $this->videoProgress()
            ->where('video_type', $videoType)
            ->whereNotNull('video_duration')
            ->get()
            ->mapWithKeys(function ($item) {
                // Convert seconds to minutes
                return [$item->video_index => $item->video_duration / 60];
            })
            ->toArray();
        
        // Merge stored durations with fallback durations (stored durations take precedence)
        return array_replace($videoDurations, $storedDurations);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
