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
        Schema::create('feedback', function (Blueprint $table) {
            $table->string('mathacmac', 50)->primary();
            $table->text('noidung');
            $table->dateTime('ngaythacmac');
            $table->dateTime('ngayphanhoi')->nullable();
            $table->string('nguoiphanhoi', 50)->nullable();
            $table->foreign('nguoiphanhoi')->references('tentaikhoan')->on('users');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
