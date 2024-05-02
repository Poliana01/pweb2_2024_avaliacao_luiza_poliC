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
    {//database/migration

        Schema::disableForeignKeyConstraints();

        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('usuario',100);
            $table->string("nmusica",100);
            $table->string("artista",100);
            $table->string("ano",4);
            $table->string("link",255);
          //  $table->string('imagem')->nullable();
            $table->foreignId('categoria_id')->nullable()
                    ->constrained('categorias')->after('id');
        //    $table->unsignedBigInteger('id_user');
          //  $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};
