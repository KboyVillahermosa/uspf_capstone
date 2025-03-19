<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('research_repositories', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('members');
            $table->string('department');
            $table->text('abstract');
            $table->string('banner_image')->nullable();
            $table->string('file'); // Stores PDF, DOCX, etc.
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_repositories');
    }
};
