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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nome');
            $table->decimal('Altura');
            $table->integer('Fase Evolutíva');
            $table->boolean('É da primeira geração?');
            $table->enum('Geração', [
                // Gerações de 1 a 9 (Kanto: 1, ...)
                'Kanto',   
                'Johto',    
                'Hoenn',     
                'Sinnoh',   
                'Unova',   
                'Kalos',    
                'Alola',     
                'Galar',     
                'Paldea'    
            ])->default('Kanto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
