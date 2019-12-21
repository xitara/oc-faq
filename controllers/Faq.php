<?php namespace Xitara\Faq\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Log;

/**
 * Faq Back-end Controller
 */
class Faq extends Controller
{
    public $requiredPermissions = [
        'xitara.faq.faq',
    ];

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Xitara.Faq', 'faq', 'faq.faq');
    }

    // public function index()
    // {

    // $this->asExtension('ListController')->index();
    // }

    public function listExtendQuery($query)
    {
        if (!$this->user->hasAccess(['xitara.faq.howto'])) {
            Log::debug(__METHOD__);
            $query->where('group_id', '<>', 10);
        }
    }

    public function create(Int $groupId = null)
    {
        $this->vars['howto'] = $groupId;
        $this->asExtension('FormController')->create();
    }

    public function onReorder()
    {
        $this->asExtension('ReorderController')->onReorder();
    }
}
