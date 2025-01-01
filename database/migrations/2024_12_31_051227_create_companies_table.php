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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('success_story')->nullable();
            $table->string('membership_number')->nullable()->unique();
            $table->string('company_type')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('fax')->nullable();
            $table->date('establishment_date')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->json('other_websites')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->default('Bangladesh');
            $table->string('status')->default('pending');
            $table->string('bin_number')->nullable()->unique();
            $table->string('tin_number')->nullable()->unique();
            $table->string('bin_file')->nullable();
            $table->string('tin_file')->nullable();
            $table->json('shareholders')->nullable();
            $table->boolean('has_trade_license')->default(false);
            $table->json('trade_license_info')->nullable();
            $table->json('board_members')->nullable();
            $table->string('company_head_name')->nullable();
            $table->string('company_head_designation')->nullable();
            $table->string('company_head_phone')->nullable();
            $table->string('company_head_email')->nullable();
            $table->string('company_head_photo')->nullable();
            $table->string('company_head_socials')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
