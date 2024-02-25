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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('href');
            $table->integer('appearance_order');
            $table->unsignedBigInteger('link_target_id');
            $table->foreign('link_target_id')->references('id')->on('link_targets');
            $table->unsignedBigInteger('link_type_id');
            $table->foreign('link_type_id')->references('id')->on('link_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
