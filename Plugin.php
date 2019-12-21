<?php namespace Xitara\Faq;

use App;
use Backend;
use BackendMenu;
use Event;
use Log;
use System\Classes\PluginBase;
use Xitara\Core\Plugin as Core;

/**
 * Faq Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['Xitara.Core'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'xitara.faq::lang.plugin.name',
            'description' => 'xitara.faq::lang.plugin.description',
            'author' => 'Xitara Websolution',
            'homepage' => 'https://xitara.net',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        BackendMenu::registerContextSidenavPartial(
            'Xitara.Faq',
            'faq',
            '$/xitara/core/partials/_sidebar.htm'
        );
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        /**
         * Check if we are currently in backend module.
         */
        if (!App::runningInBackend()) {
            return;
        }

        /**
         * add items to sidemenu
         */
        // PMCore::getSideMenu('Xitara.Faq', 'faq');
        Core::getSideMenu('Xitara.Faq', 'faq');

        Event::listen('backend.list.extendQuery', function ($widget, $query) {
            Log::debug(__METHOD__);
            if ($widget->model instanceof \Foo\Bar\Models\Item) {
                // Only backend users who are not super user
                if (Auth::getUser()->isSuperUser()) {
                    return;
                }

                $allowed = Auth::getUser()->allowedItems->lists('id');
                $query->whereIn('id', $allowed);
            }
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Xitara\Faq\Components\FaqList' => 'faqList',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'xitara.faq.faq' => [
                'tab' => 'PmFaq',
                'label' => 'FAQs verwalten',
                'order' => 90,
            ],
            'xitara.faq.group' => [
                'tab' => 'PmFaq',
                'label' => 'Gruppen verwalten',
                'order' => 91,
            ],
            'xitara.faq.howto' => [
                'tab' => 'PmFaq',
                'label' => 'HowTo\'s verwalten',
                'order' => 92,
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'faq' => [
                'label' => 'xitara.faq::lang.plugin.name',
                'url' => Backend::url('xitara/faq/faq'),
                'icon' => 'icon-leaf',
                'permissions' => ['xitara.faq.*'],
                'order' => 500,
                'hidden' => true,
            ],
            'howto' => [
                'label' => 'xitara.faq::lang.plugin.name',
                'url' => Backend::url('xitara/faq/faq'),
                'icon' => 'icon-leaf',
                'permissions' => ['xitara.faq.howto'],
                'order' => 500,
                'hidden' => true,
            ],
        ];
    }

    /**
     * mainmenu
     * @autor   mburghammer
     * @date    Sa 14 Jul 2018 13:04:40 CEST
     *
     * @see Xitara\Core::getSideMenu
     *
     * @version 0.0.1
     * @since   0.0.1
     * @return  array                   sidemenu-data
     */
    public static function injectSideMenu()
    {
        $menu = [
            'faq.faq' => [
                'group' => 'xitara.faq::lang.submenu.name',
                'label' => 'xitara.faq::lang.submenu.faqs',
                'url' => Backend::url('xitara/faq/faq'),
                'icon' => 'icon-archive',
                'permissions' => ['xitara.faq.faq'],
                'order' => 1400,
            ],
            'faq.groups' => [
                'group' => 'xitara.faq::lang.submenu.name',
                'label' => 'xitara.faq::lang.submenu.groups',
                'url' => Backend::url('xitara/faq/groups'),
                'icon' => 'icon-archive',
                'permissions' => ['xitara.faq.group'],
                'order' => 1401,
            ],
        ];

        return $menu;
    }
}
