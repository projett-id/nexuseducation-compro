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
        Schema::table('partner_schools', function (Blueprint $table) {
            // add new fields
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_schools', function (Blueprint $table) {
            // rollback
            $table->dropColumn(['slug']);
        });
    }
};
