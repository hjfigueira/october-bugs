<?php namespace Hjfigueira\Bugs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableBugs extends Migration
{
    public function up()
    {
        Schema::create('hjfigueira_bugs_bugs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titulo', 250);
            $table->text('recebido')->nullable();
            $table->text('esperado')->nullable();
            $table->integer('prioridade_id')->unsigned();
            $table->integer('severidade_id')->unsigned();
            $table->integer('responsavel_id')->unsigned();
            $table->integer('projeto_id')->unsigned();
            $table->json('etapas');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hjfigueira_bugs_bugs');
    }
}
