<?php namespace Xitara\Faq\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
// use Flash;
// use Lang;
use Xitara\Faq\Models\Group;

/**
 * Groups Back-end Controller
 */
class Groups extends Controller
{
    public $requiredPermissions = ['xitara.faq.group'];

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Xitara.Faq', 'faq', 'faq.groups');
    }

    // public function relationExtendQuery($widget, $field)
    // {
    //     Log::debug(__METHOD__);
    //     $widget->bindEvent('list.extendQuery', function() { ... });
    // }

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

    //         Flash::success(Lang::get('xitara.faq::lang.groups.delete_selected_success'));
    //     } else {
    //         Flash::error(Lang::get('xitara.faq::lang.groups.delete_selected_empty'));
    //     }

    //     return $this->listRefresh();
    // }

    /**
     * @return mixed
     */
    public function getListConfig()
    {
        return $this->listConfig;
    }
}
