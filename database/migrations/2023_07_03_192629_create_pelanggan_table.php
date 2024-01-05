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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gol');
            $table->foreignId('id_user');
            $table->string('no', 20)->unique();
            $table->string('nama', 50);
            $table->text('alamat');
            $table->string('hp', 20);
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->timestamps();
            
            $table->foreign('id_gol')->references('id')->on('golongan')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
