<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('video_type'); // 'why', 'what', 'how', 'dm'
            $table->integer('video_index'); // index video dalam series
            $table->integer('progress_percentage')->default(0); // progress dalam persen
            $table->float('current_time')->default(0); // waktu terakhir dalam detik
            $table->boolean('is_completed')->default(false); // apakah video sudah selesai
            $table->timestamp('last_watched_at')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Unique constraint untuk mencegah duplikasi
            $table->unique(['user_id', 'video_type', 'video_index']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_progress');
    }
};
