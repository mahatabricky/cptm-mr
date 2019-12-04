<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;


use Cptmmr\Api\SettingsApi;
use Cptmmr\Base\BaseController;
use Cptmmr\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public  $settings;

    public $pages = array();

    public $subpages  = array();

    public $callbacks;
   
    public function register()
    {

        $this->settings = new SettingsApi ();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();
        
        $this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->addSubPages( $this->subpages )
               ->register();
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

    public function setSubPages()
    {

         $this->subpages = array(
            array(
                'parent_slug' => 'cptmmr_plugin',
                'page_title'  => 'Custom Post Type',
                'menu_title'  => 'CPT Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'cpt_manager',
                'callback'    => array($this->callbacks,'cptTemplates')  
            ),
            array(
                'parent_slug' => 'cptmmr_plugin',
                'page_title'  => 'Taxonomies Manager',
                'menu_title'  => 'Taxonomies',
                'capability'  => 'manage_options',
                'menu_slug'   => 'taxonomies_manager',
                'callback'    => array($this->callbacks,'taxonomiesTemplates')  
            ),
            array(
                'parent_slug' => 'cptmmr_plugin',
                'page_title'  => 'Widget Managaer',
                'menu_title'  => 'Widget',
                'capability'  => 'manage_options',
                'menu_slug'   => 'widget_manager',
                'callback'    => array($this->callbacks,'widgetTemplates')  
            ),
        );    
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'cptmr_options_group',
                'option_name'  => 'text_example',
                'callback'     => array( $this->callbacks , 'cptmrOptionsGroup' )
            )
        );

        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id'       => 'cptmr_admin_index',
                'title'    => 'Settings',
                'callback' => array( $this->callbacks , 'cptmrAdminSection' ),
                'page'     => 'cptmmr_plugin'
            )
        );

        $this->settings->setSections( $args );
    }    

    public function setFields()
    {
        $args = array(
            array(
                'id'       => 'text_example',
                'title'    => 'Text Example',
                'callback' => array( $this->callbacks , 'cptmrTextExample' ),
                'page'     => 'cptmmr_plugin',
                'section'  => 'cptmr_admin_index',
                'args'     => array(
                    'labels_for' => 'text_example',
                    'class'      => 'example-class'
                )
            )
        );

        $this->settings->setFields( $args );
    }     

}
?>