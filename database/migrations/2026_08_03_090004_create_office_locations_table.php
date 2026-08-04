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
        Schema::create('office_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_column')->default(0);
            $table->string('slug')->unique();
            $table->string('eyebrow');
            $table->string('title_fr');
            $table->string('title_en');
            $table->text('address');
            $table->string('phone');
            $table->string('cta_label_fr');
            $table->string('cta_label_en');
            $table->boolean('is_dark')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_locations');
    }
};
