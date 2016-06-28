<?php namespace Hjfigueira\Bugs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTableComentarios extends Migration
{
    public function up()
    {
        Schema::create('hjfigueira_bugs_comentarios', function($table)
        {
            $table->engine = 'InnoDB';
            $table->timestamps();
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->string('mensagem', 250);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hjfigueira_bugs_comentarios');
    }
}
