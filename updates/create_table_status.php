<?php namespace Hjfigueira\Bugs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use Hjfigueira\Bugs\Models\Status;

class CreateTableStatus extends Migration
{
    public function up()
    {
        Schema::create('hjfigueira_bugs_status', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titulo', 250);
            $table->string('cor', 5);
        });

        Schema::create('hjfigueira_bugs_status_pivot', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->integer('bug_id');
            $table->integer('status_id');
        });

        $this->seed();
    }
    
    public function down()
    {
        Schema::dropIfExists('hjfigueira_bugs_status');
        Schema::dropIfExists('hjfigueira_bugs_status_pivot');
    }

        public function seed(){

                $itens = [
            [
                'titulo' => 'Aberto',
                'cor' => '',
            ],
            [
                'titulo' => 'Em Processo',
                'cor' => '',
            ],
            [
                'titulo' => 'Pausado',
                'cor' => '',
            ],
            [
                'titulo' => 'Duplicado',
                'cor' => '',
            ],
            [
                'titulo' => 'Resolvido',
                'cor' => '',
            ],
            [
                'titulo' => 'Fechado',
                'cor' => '',
            ]
        ];

        foreach ($itens as $item) {
            Status::create($item);
        }

    }
}
