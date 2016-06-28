<?php namespace Hjfigueira\Bugs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use Hjfigueira\Bugs\Models\Prioridade;

class CreateTablePrioridade extends Migration
{
    public function up()
    {
        Schema::create('hjfigueira_bugs_prioridade', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titulo');
            $table->string('descricao')->nullable();
            $table->integer('peso')->unsigned();
        });

        $this->seed();

    }
    
    public function down()
    {
        Schema::dropIfExists('hjfigueira_bugs_prioridade');
    }

    public function seed(){

                $itens = [
            [
                'titulo' => 'Muito Baixa',
                'descricao' => '',
                'peso' => '1',
            ],
            [
                'titulo' => 'Baixa',
                'descricao' => '',
                'peso' => '2',
            ],
            [
                'titulo' => 'Média',
                'descricao' => '',
                'peso' => '3',
            ],
            [
                'titulo' => 'Alta',
                'descricao' => '',
                'peso' => '4',
            ],
            [
                'titulo' => 'Muito Alta',
                'descricao' => '',
                'peso' => '5',
            ]
        ];

        foreach ($itens as $item) {
            Prioridade::create($item);
        }

    }
}
