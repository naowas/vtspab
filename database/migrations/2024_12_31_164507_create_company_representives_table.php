<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_representatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('designation');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->json('socials')->nullable();
            $table->string('nid_number')->nullable()->unique();
            $table->string('nid_file')->nullable();
            $table->string('passport_number')->nullable()->unique();
            $table->string('passport_file')->nullable();
            $table->string('driving_license_number')->nullable()->unique();
            $table->string('driving_license_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_representives');
    }
};
