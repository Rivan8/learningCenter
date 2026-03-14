<?php

namespace App\Http\Controllers;

use App\Models\VideoProgress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class VideoProgressController extends Controller
{
    /**
     * Get user's video progress for a specific video type
     */
    public function getProgress(Request $request): JsonResponse
    {
        $videoType = $request->input('video_type');
        $userId = Auth::id();

        if (!$videoType) {
            return response()->json(['error' => 'Video type is required'], 400);
        }

        $progress = VideoProgress::getUserProgress($userId, $videoType);

        return response()->json([
            'success' => true,
            'data' => $progress
        ]);
    }

    /**
     * Update video progress
     */
    public function updateProgress(Request $request): JsonResponse
    {
        $request->validate([
            'video_type' => 'required|string',
            'video_index' => 'required|integer|min:0',
            'progress_percentage' => 'required|integer|min:0|max:100',
            'current_time' => 'nullable|numeric|min:0',
            'video_duration' => 'nullable|numeric|min:0'
        ]);

        $userId = Auth::id();
        $videoType = $request->input('video_type');
        $videoIndex = $request->input('video_index');
        $progressPercentage = $request->input('progress_percentage');
        $currentTime = $request->input('current_time', 0);
        $videoDuration = $request->input('video_duration');

        $progress = VideoProgress::updateProgress(
            $userId,
            $videoType,
            $videoIndex,
            $progressPercentage,
            $currentTime,
            $videoDuration
        );

        return response()->json([
            'success' => true,
            'data' => $progress
        ]);
    }

    /**
     * Get user's last watched video for a specific type
     */
    public function getLastWatched(Request $request): JsonResponse
    {
        $videoType = $request->input('video_type');
        $userId = Auth::id();

        if (!$videoType) {
            return response()->json(['error' => 'Video type is required'], 400);
        }

        $lastWatched = VideoProgress::where('user_id', $userId)
            ->where('video_type', $videoType)
            ->where('progress_percentage', '<', 100)
            ->orderBy('video_index')
            ->first();

        return response()->json([
            'success' => true,
            'data' => $lastWatched
        ]);
    }

    /**
     * Reset progress for a video type
     */
    public function resetProgress(Request $request): JsonResponse
    {
        $videoType = $request->input('video_type');
        $userId = Auth::id();

        if (!$videoType) {
            return response()->json(['error' => 'Video type is required'], 400);
        }

        VideoProgress::where('user_id', $userId)
            ->where('video_type', $videoType)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Progress reset successfully'
        ]);
    }
}
