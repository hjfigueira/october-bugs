<?php namespace Hjfigueira\Bugs\Models;

use Model;
use Hjfigueira\Bugs\Models\Status;

/**
 * Model
 */
class Bug extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
        'titulo'        => 'required|max:250',
        // 'prioridade'    => 'required',
        // 'severidade'    => 'required'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'hjfigueira_bugs_bugs';

    public $jsonable = ['etapas'];

    /**
     * @var array Relations configuration
     */
    public $hasOne = [

        // 'tipo'          => ['Hjfigueira\Bugs\Models\Tipo'],
        // 'secao'         => ['Hjfigueira\Bugs\Models\Secao'],
    ];

    public $belongsTo = [
        'responsavel'   => ['Backend\Models\User'],
        'prioridade'    => ['Hjfigueira\Bugs\Models\Prioridade'],
        'severidade'    => ['Hjfigueira\Bugs\Models\Severidade'],
        'projeto'       => ['Hjfigueira\Projetos\Models\Projeto']
    ];

    public $belongsToMany = [
        'status'        => ['Hjfigueira\Bugs\Models\Status', 'table' => 'hjfigueira_bugs_status_pivot']
    ];

    public $attachMany = [
        'arquivos'      => ['System\Models\File']
    ];

    public function afterSave()
    {
        //Grava o status de abertura
        $status = Status::find(1);
        $this->pushStatus($status);
    }

    public function pushStatus(Status $status)
    {
        $this->status()->attach($status);
    }


    public function scopeApenasMinhas($query){

        $currentUser = \BackendAuth::getUser();
        $query->where('responsavel_id', $currentUser->id);
        return $query;
    }

}