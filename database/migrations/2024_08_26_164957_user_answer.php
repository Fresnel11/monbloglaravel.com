<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Cette table enregistrera les réponses des utilisasteurs
     */
    public function up(): void
    {
        Schema::create('user_answer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Associe la réponse à un utilisateur
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade'); // Associe la réponse à une question
            $table->boolean('user_answer'); // 1 pour vrai, 0 pour faux
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
        

    }
};
