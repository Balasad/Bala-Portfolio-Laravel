<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tracks page views and events (CV downloads, tool clicks)
        Schema::create('analytics_events', function (Blueprint $table) {
            $table->id();
            $table->string('event');          // 'page_view', 'cv_download', 'tool_click', 'contact_sent'
            $table->string('payload')->nullable(); // e.g. tool name for 'tool_click'
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referrer')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};
