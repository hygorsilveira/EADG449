<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorrigeTramiteOnDeleteTabelaTramites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tramites', function (Blueprint $table) {
						$table->dropForeign(['processo_id']);
						$table->foreign('processo_id')
						    ->references('id')
								->on('processos')
							  ->onDelete('cascade');
						$table->dropForeign(['unidade_id']);
						$table->foreign('unidade_id')
						    ->references('id')
								->on('unidades')
							  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tramites', function (Blueprint $table) {
						$table->dropForeign(['processo_id']);
						$table->foreign('processo_id')
						    ->references('id')
								->on('processos');
						$table->dropForeign(['unidade_id']);
						$table->foreign('unidade_id')
						    ->references('id')
								->on('unidades');
        });
    }
}
