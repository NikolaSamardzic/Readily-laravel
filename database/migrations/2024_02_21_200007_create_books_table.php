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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('page_count');
            $table->decimal('price',10,2);
            $table->date('release_date');
            $table->text('description');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('image_id');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('image_id')->references('id')->on('images');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
