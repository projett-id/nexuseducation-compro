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
            $table->dropColumn('content');
            // add new fields
            $table->string('location')->nullable();
            $table->string('banner_header')->nullable();
            $table->string('website')->nullable();
            $table->string('maps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_schools', function (Blueprint $table) {
            // rollback
            $table->longText('content')->nullable();

            $table->dropColumn(['location', 'banner_header', 'website', 'maps']);
        });
    }
};
