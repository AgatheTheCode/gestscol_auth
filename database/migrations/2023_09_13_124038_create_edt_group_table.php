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
        Schema::create('edt_group', function (Blueprint $table) {
            $table->foreignId('edt_id')->constrained('edts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['edt_id', 'group_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edt_group');
    }
};
