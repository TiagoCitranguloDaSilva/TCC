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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 150);
            $table->boolean("disponivel");
            $table->string("linkImagem", 200);
            $table->string("descricao", 500);
            $table->decimal("preco", total: 5, places: 2);
            $table->unsignedBigInteger("idCategoria");

            $table->foreign("idCategoria")->references("id")->on("categorias");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
