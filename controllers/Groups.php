<?php namespace Xitara\PMFaq\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
// use Flash;
// use Lang;
use Xitara\PMFaq\Models\Group;

/**
 * Groups Back-end Controller
 */
class Groups extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Xitara.PMFaq', 'pmfaq', 'pmfaq.groups');
    }

    /**
     * Deleted checked groups.
     */
    // public function index_onDelete()
    // {
    //     if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

    //         foreach ($checkedIds as $groupId) {
    //             if (!$group = Group::find($groupId)) {
    //                 continue;
    //             }

    //             $group->delete();
    //         }

    //         Flash::success(Lang::get('xitara.pmfaq::lang.groups.delete_selected_success'));
    //     } else {
    //         Flash::error(Lang::get('xitara.pmfaq::lang.groups.delete_selected_empty'));
    //     }

    //     return $this->listRefresh();
    // }
}
