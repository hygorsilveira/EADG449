<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorrigeAssuntoDeleteTabelaProcessos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('processos', function (Blueprint $table) {
					$table->integer('assunto_id')
						->unsigned()
						->nullable()
						->change();
					$table->dropForeign(['assunto_id']);
					$table->foreign('assunto_id')
						->references('id')
						->on('assuntos')
						->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('processos', function (Blueprint $table) {
            $table->integer('assunto_id')->unsigned()->change();
					$table->dropForeign(['assunto_id']);
						$table->foreign('assunto_id')
							->references('id')
							->on('assuntos');
        });
    }
}
