<?php namespace Hjfigueira\Bugs\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Bugs extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Hjfigueira.Bugs', 'bugs');
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

}