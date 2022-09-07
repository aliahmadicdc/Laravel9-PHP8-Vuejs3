<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alt')->nullable();
            $table->integer('imageable_id');
            $table->string('imageable_type');
            $table->string('directory')->nullable();
            $table->string('thumbnail_sub_directory')->nullable();
            $table->string('upload_type')->nullable();
            $table->longText('image_full_path')->nullable();
            $table->longText('thumbnail_full_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
