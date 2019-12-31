<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;


use Cptmmr\Api\SettingsApi;
use Cptmmr\Base\BaseController;
use Cptmmr\Callbacks\AdminCallbacks;
use Cptmmr\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public  $settings;

    public $pages = array();

   // public $subpages  = array();

    public $callbacks;

    public $callbacks_mngr;
   
    public function register()
    {

        $this->settings = new SettingsApi ();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

      //  $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        // $this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->addSubPages( $this->subpages )
        //        ->register();
        $this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->register();       
    }


    public function setPages()
    {
    
         $this->pages = array( 
            array(
               'page_title' => 'Cptmmr',
               'menu_title' => 'CPTMMR',
               'capability' => 'manage_options',
               'menu_slug'  => 'cptmmr_plugin',
               'callback'   => array($this->callbacks,'dashboardTemplates'),//function(){ echo '<h1>Plugin Dashboard </h1>' ;},
               'icon_url'   => 'dashicons-store',
               'position'  => '110',
            ),
       );
    }

    
    public function setSettings()
    {
        
        $args = array(
                  array(
                    'option_group' => 'cptmr_plugin_settings',
                    'option_name'  => 'cptmmr_plugin',
                    'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
                    )
               );

        $this->settings->setSettings( $args );

    }

    public function setSections()
    {
        $args = array(
            array(
                'id'       => 'cptmr_admin_index',
                'title'    => 'Settings Manager',
                'callback' => array( $this->callbacks_mngr , 'adminSectionManager' ),
                'page'     => 'cptmmr_plugin'
            )
        );

        $this->settings->setSections( $args );
    }    

    public function setFields()
    {
        
        $args = array();

        foreach ( $this->managers as $key => $value ){

            $args[] = array(
                'id'       => $key,
                'title'    => $value,
                'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                'page'     => 'cptmmr_plugin',
                'section'  => 'cptmr_admin_index',
                'args'     => array(
                    'option_name'=> 'cptmmr_plugin',
                    'labels_for' => $key,
                    'class'      => 'ui-toggle',
                    'data-toggle'=> 'toggle'
                )
            );
        }       

        $this->settings->setFields( $args );
    }     

}
?>