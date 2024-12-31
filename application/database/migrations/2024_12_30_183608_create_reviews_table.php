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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('id_doctor');  
            $table->unsignedBigInteger('id_patient'); 
            $table->text('comment');  
            $table->integer('rating');  
            $table->timestamps();  
            // Définir les clés étrangères
            $table->foreign('id_doctor')->references('id_doctor')->on('doctors')->onDelete('cascade');
            $table->foreign('id_patient')->references('id_patient')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
