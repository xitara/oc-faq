<?php namespace Xitara\PMFaq\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Faq Back-end Controller
 */
class Faq extends Controller
{
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

        BackendMenu::setContext('Xitara.PMFaq', 'pmfaq', 'pmfaq.faq');
    }

    public function onReorder()
    {
        trace_sql();
        $this->asExtension('ReorderController')->onReorder();
    }
}
