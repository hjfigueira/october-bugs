<?php namespace Hjfigueira\Bugs;

use System\Classes\PluginBase;
use Backend\Models\User as UserModel;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerPermissions()
    {
    }

    public function registerSettings()
    {
    }

    public function registerNavigation()
    {
        return [];
    }

    public function boot(){

    	//Extending User Plugin
	    UserModel::extend(function($model) {
	        $model->hasMany['bugs'] = ['Hjfigueira\Bugs\Models\Bug'];
	    });

        \Event::listen('projetos.listarModulos', function() {

            return [
                'bugs' => [
                    'label'       => 'Bugs',
                    'icon'        => 'icon-bug',
                    'url'   =>  \Backend::url('hjfigueira/bugs/projeto/index/:slug'),
                    'permissions' => ['hjfigueira.projetos.access_projetos']
                ],

            ];

        });

    }
}
