<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            // Manually define the 'tokenable_type' and 'tokenable_id' columns
            $table->string('tokenable_type', 191); // Set the length to 191 to avoid index size issues
            $table->unsignedBigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 255)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
    
            // Add index for tokenable_type and tokenable_id (after manually defining the columns)
            $table->index(['tokenable_type', 'tokenable_id']); // Create an index for the morphs fields
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
