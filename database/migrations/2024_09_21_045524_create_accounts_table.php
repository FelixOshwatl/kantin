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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('role_id')->default(2); 
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('username')->unique();
            $table->string('password');    
            $table->string('alamat');    
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);    
            $table->string('no_hp');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
