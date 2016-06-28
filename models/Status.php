<?php namespace Hjfigueira\Bugs\Models;

use Model;

/**
 * Model
 */
class Status extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'hjfigueira_bugs_status';

    public $belongsToMany = [

        'bugs' => ['Hjfigueira\Bugs\Models\Bug', 'table' => 'hjfigueira_bugs_status_pivot']

    ];
}