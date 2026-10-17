<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_id column එක
            $table->foreignId('template_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('groom_name');
            $table->string('bride_name');
            $table->string('quote')->nullable();
            $table->string('recipient')->default('You');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('venue');
            $table->string('rsvp_contact')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};