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
        Schema::create('colaborators', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('dni')->unique();
            $table->date('fec_nac');
            $table->char('sexo',1);
            $table->string('cant_hijos');
            $table->string('foto')->nullable();
            $table->string('area')->nullable();
            $table->string('cargo')->nullable();
            $table->dateTime('fec_ingreso');
            $table->double('sueldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborators');
    }
};
