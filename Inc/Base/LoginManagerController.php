<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class LoginManagerController extends BaseController
{

    public $subpages = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        if ( !$this->activated('login_manager') ) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages( $this->subpages )->register();

       // add_action('init', array( $this,'activate'));

    }


    public function setSubPages()
    {

         $this->subpages = array(
            array(
                'parent_slug' => 'cptmmr_plugin',
                'page_title'  => 'Login Manager',
                'menu_title'  => 'Login Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'login_manager',
                'callback'    => array($this->callbacks,'loginTemplates')  
            ),
            
        );    
    }


       
    
}