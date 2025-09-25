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
        Schema::create('about', function (Blueprint $table) {
            $table->string('address');
            $table->string('company_name');
            $table->string('proprietor');
            $table->string('contact_no');
            $table->string('email');
            $table->text('vision');
            $table->text('mission');
            $table->JSON('values');
            $table->text('about');
            $table->text('link_maps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
