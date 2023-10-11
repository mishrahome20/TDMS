<?php

use App\enum\ProjectPriority;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->date('deadline');
            $table->enum('priority',[ProjectPriority::NORMAL, ProjectPriority::HIGH, ProjectPriority::URGENT])->default(ProjectPriority::NORMAL)->comment('0 => Normal, 1 => High, 2 => Urgent');
            $table->foreignId('project_id')->constrained('projects');
            $table->string('created_by')->default(0);
            $table->string('updated_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
