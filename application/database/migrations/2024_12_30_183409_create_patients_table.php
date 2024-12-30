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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('id_patient');  
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('nom');
            $table->date('date_naissance');
            $table->float('poids');
            $table->float('taille');
            $table->timestamps();
        });
        

       
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
