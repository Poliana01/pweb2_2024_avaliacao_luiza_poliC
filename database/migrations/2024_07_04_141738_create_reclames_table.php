<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::disableForeignKeyConstraints();

        Schema::create('reclame', function (Blueprint $table) {
            $table->id();
            $table->string('nNome',100);
            $table->string("nData",100);
            $table->string("nAvaliacao",255);
            $table->string("categoria",120);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('reclames');
    }
};
