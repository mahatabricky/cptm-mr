<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class TemplatesManagerController extends BaseController
{

    public $subpages = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        if ( !$this->activated('templates_manager') ) return;

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
                'page_title'  => 'Templates Manager',
                'menu_title'  => 'Templates Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'templates_manager',
                'callback'    => array($this->callbacks,'templateTemplates')  
            ),
           
        );    
    }


       
    
}