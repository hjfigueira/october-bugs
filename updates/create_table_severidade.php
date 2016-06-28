<?php namespace Hjfigueira\Bugs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use Hjfigueira\Bugs\Models\Severidade;

class CreateTableSeveridade extends Migration
{
    public function up()
    {
        Schema::create('hjfigueira_bugs_severidade', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titulo');
            $table->integer('peso')->unsigned();
        });

        $this->seed();
    }
    
    public function down()
    {
        Schema::dropIfExists('hjfigueira_bugs_severidade');
    }

     public function seed(){

                $itens = [
            [
                'titulo' => 'Muito Baixa',
                'peso' => '1',
            ],
            [
                'titulo' => 'Baixa',
                'peso' => '1',
            ],
            [
                'titulo' => 'Média',
                'peso' => '2',
            ],
            [
                'titulo' => 'Grave',
                'peso' => '3',
            ],
            [
                'titulo' => 'Crítica',
                'peso' => '4',
            ]
        ];

        foreach ($itens as $item) {
            Severidade::create($item);
        }

    }
}
