<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('turmas', function (Blueprint $table) {
        $table->integer('ano'); // Adiciona o campo 'ano' à tabela
    });
}

public function down()
{
    Schema::table('turmas', function (Blueprint $table) {
        $table->dropColumn('ano'); // Caso precise desfazer a migration, remove o campo 'ano'
    });
}

};
