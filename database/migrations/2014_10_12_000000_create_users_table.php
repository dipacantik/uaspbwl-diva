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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('hp', 25)->nullable();
            $table->string('pos', 5)->nullable();
            $table->tinyInteger('role')->default(2); // 1 = Admin, 2 = User
            $table->tinyInteger('aktif')->default(1); // 0 = Nonaktif, 1 = Aktif
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
