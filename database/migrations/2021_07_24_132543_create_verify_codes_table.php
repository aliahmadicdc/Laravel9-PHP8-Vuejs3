<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifyCodesTable extends Migration
{
    public function up(): void
    {
        Schema::create('verify_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verify_codes');
    }
}
