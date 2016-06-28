<?php namespace Hjfigueira\Bugs\Controllers;

use BackendMenu;
use Hjfigueira\Projetos\Controllers\Submodule;

class Projeto extends Submodule
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Hjfigueira.Projetos', 'projetos','bugs');
    }

    public function onUpdateStatus(){

    	$status = Status::find(post('status'));
    	
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $postId) {
                if ((!$post = Noticia::find($postId)))
                    continue;


                $post->pushStatus($status);
            }

            Flash::success('Status alterados !');
        }

        return $this->listRefresh();

    }

    public function listExtendQuery($query)
    {
        $query->where('projeto_id',$this->currentProject->id);
        $query->selectRaw('(select slug from `hjfigueira_projetos_projetos` where `hjfigueira_bugs_bugs`.`projeto_id` = hjfigueira_projetos_projetos.id) as projeto_slug ');
    }
}