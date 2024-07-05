<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::disableForeignKeyConstraints();

        Schema::create('compositor', function (Blueprint $table) {
            $table->id();
            $table->string('nNome',100);
            $table->string("nMusica",100);
            $table->string("nLink",255);
            $table->string("nAvaliacao",255);
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->after('id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('compositor');
    }
};
