<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('nomeplay',100);

            $table->foreignId('musica_1_id')->nullable()
                ->constrained('musicas')->after('id');

            $table->foreignId('musica_2_id')->nullable()
              ->constrained('musicas')->after('id');

              $table->foreignId('musica_3_id')->nullable()
              ->constrained('musicas')->after('id');

              $table->foreignId('musica_4_id')->nullable()
              ->constrained('musicas')->after('id');

              $table->foreignId('musica_5_id')->nullable()
              ->constrained('musicas')->after('id');

              $table->foreignId('musica_6_id')->nullable()
              ->constrained('musicas')->after('id');

              $table->foreignId('musica_7_id')->nullable()
              ->constrained('musicas')->after('id');

          //  $table->string('imagem')->nullable();
            $table->foreignId('categoria_id')->nullable()
                    ->constrained('categorias')->after('id');
           // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
