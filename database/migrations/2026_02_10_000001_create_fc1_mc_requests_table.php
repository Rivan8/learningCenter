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
        if (!Schema::hasTable('fc1_mc_requests')) {
            Schema::create('fc1_mc_requests', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('alasan', 255);
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->index('status');
            });
        } else {
            if (!Schema::hasColumn('fc1_mc_requests', 'created_at') || !Schema::hasColumn('fc1_mc_requests', 'updated_at')) {
                Schema::table('fc1_mc_requests', function (Blueprint $table) {
                    if (!Schema::hasColumn('fc1_mc_requests', 'created_at')) {
                        $table->timestamp('created_at')->nullable()->after('status');
                    }
                    if (!Schema::hasColumn('fc1_mc_requests', 'updated_at')) {
                        $table->timestamp('updated_at')->nullable()->after('created_at');
                    }
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fc1_mc_requests');
    }
};
