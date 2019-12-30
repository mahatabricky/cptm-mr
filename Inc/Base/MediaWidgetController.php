<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class MediaWidgetController extends BaseController
{

    public $subpages = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        if ( !$this->activated('media_widget') ) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages( $this->subpages )->register();

      //  add_action('init', array( $this,'activate'));

    }



    public function setSubPages()
    {

         $this->subpages = array(
            array(
                'parent_slug' => 'cptmmr_plugin',
                'page_title'  => 'Media Widget',
                'menu_title'  => 'Media Widget Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'media_widget_manager',
                'callback'    => array($this->callbacks,'widgetTemplates')  
            ),
            
        );    
    }


       
    
}