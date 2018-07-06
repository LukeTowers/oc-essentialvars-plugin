<?php namespace LukeTowers\EssentialVars;

use Lang;
use View;
use Event;
use Config;
use System\Classes\PluginBase;
use Backend\Models\BrandSetting;

/**
 * EssentialVars Plugin Information File
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
            'name'        => 'EssentialVars',
            'description' => 'Adds the app_[url|logo|name|debug|description] variables to Mail & CMS templates',
            'author'      => 'Luke Towers',
            'icon'        => 'icon-code',
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
     public function boot()
     {
         $appVars = [
             'url'         => url('/'),
             'logo'        => BrandSetting::getLogo() ?: url('/modules/backend/assets/images/october-logo.svg'),
             'name'        => BrandSetting::get('app_name'),
             'debug'       => Config::get('app.debug', false),
             'description' => BrandSetting::get('app_tagline'),
         ];

         // Share the variables with the mail template system
         View::share('app_url', $appVars['url']);
         View::share('app_logo', $appVars['logo']);
         View::share('app_name', $appVars['name']);
         View::share('app_debug', $appVars['debug']);
         View::share('app_description', $appVars['description']);

         // Share the variables with the CMS template system
         Event::listen('cms.page.beforeDisplay', function ($controller, $url, $page) use ($appVars) {
             $controller->vars['app_url']         = $appVars['url'];
             $controller->vars['app_logo']        = $appVars['logo'];
             $controller->vars['app_name']        = $appVars['name'];
             $controller->vars['app_debug']       = $appVars['debug'];
             $controller->vars['app_description'] = $appVars['description'];
         });
     }
}
