<?php namespace Xitara\PMFaq;

use App;
use Backend;
use BackendMenu;
use System\Classes\PluginBase;
use Xitara\PMCore\Plugin as PMCore;

/**
 * PMFaq Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'xitara.pmfaq::lang.plugin.name',
            'description' => 'xitara.pmfaq::lang.plugin.description',
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
            'Xitara.PMFaq',
            'pmfaq',
            '$/xitara/pmcore/partials/_sidebar.htm'
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
        PMCore::getSideMenu('Xitara.PMFaq', 'pmfaq');
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Xitara\PMFaq\Components\FaqList' => 'faqList',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'xitara.pmfaq.some_permission' => [
                'tab' => 'xitara.pmfaq::lang.plugin.name',
                'label' => 'xitara.pmfaq::lang.permissions.some_permission',
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
            'pmfaq' => [
                'label' => 'xitara.pmfaq::lang.plugin.name',
                'url' => Backend::url('xitara/pmfaq/faq'),
                'icon' => 'icon-leaf',
                'permissions' => ['xitara.pmfaq.*'],
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
     * @see Xitara\Toolbox::getSideMenu
     *
     * @version 0.0.1
     * @since   0.0.1
     * @return  array                   sidemenu-data
     */
    public static function injectSideMenu()
    {
        return [
            'pmfaq.faq' => [
                'group' => 'xitara.pmfaq::lang.submenu.name',
                'label' => 'xitara.pmfaq::lang.submenu.faqs',
                'url' => Backend::url('xitara/pmfaq/faq'),
                'icon' => 'icon-archive',
            ],
            'pmfaq.groups' => [
                'group' => 'xitara.pmfaq::lang.submenu.name',
                'label' => 'xitara.pmfaq::lang.submenu.groups',
                'url' => Backend::url('xitara/pmfaq/groups'),
                'icon' => 'icon-archive',
            ],
        ];
    }
}
