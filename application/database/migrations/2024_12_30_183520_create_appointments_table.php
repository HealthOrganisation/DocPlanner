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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('id_doctor');  
            $table->unsignedBigInteger('id_patient'); 
            $table->unsignedBigInteger('id_dispo'); 
            $table->foreign('id_doctor')->references('id_doctor')->on('doctors')->onDelete('cascade');
            $table->foreign('id_patient')->references('id_patient')->on('patients')->onDelete('cascade');
            $table->foreign('id_dispo')->references('id_dispo')->on('availabilities')->onDelete('cascade');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();  // Colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
