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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('full_name'); // Nama Lengkap
            $table->string('email'); // Email
            $table->string('birthdate'); // Tempat Tanggal Lahir
            $table->string('photo')->nullable(); // Foto
            $table->string('ktp')->nullable(); // KTP
            $table->text('address'); // Alamat
            $table->string('phone'); // No Hp
            $table->string('job'); // Job
            $table->text('reason'); // Alasan
            $table->enum('shirt_size', allowed: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']); // Kemeja
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
