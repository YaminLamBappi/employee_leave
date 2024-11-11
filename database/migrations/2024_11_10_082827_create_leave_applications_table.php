<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to user who requested leave
            $table->enum('leave_type', ['sick', 'casual']);
            $table->date('leave_from');
            $table->date('leave_to');
            $table->text('reason');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // For admin approval
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_applications');
    }
};
