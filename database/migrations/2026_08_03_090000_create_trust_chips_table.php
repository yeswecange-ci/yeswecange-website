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
        Schema::create('trust_chips', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_column')->default(0);
            $table->string('key')->unique();
            $table->string('label_fr');
            $table->string('label_en');
            $table->text('text_fr');
            $table->text('text_en');
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trust_chips');
    }
};
