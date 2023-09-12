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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('categorie', 100);
            $table->string('name', 100);
            $table->string('promotion', 100);
            $table->integer('num_tp')->nullable();
            $table->integer('num_td')->nullable();
            $table->string('option', 100)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
