<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;


use Cptmmr\Api\SettingsApi;
use Cptmmr\Base\BaseController;
use Cptmmr\Callbacks\AdminCallbacks;
use Cptmmr\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public  $settings;

    public $pages = array();

    public $subpages  = array();

    public $callbacks;

    public $callbacks_mngr;
   
    public function register()
    {

        $this->settings = new SettingsApi ();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

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
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'cpt_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'taxonomy_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'media_widget',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'gallery_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'testimonial_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'templates_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'login_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'membership_manager',
                'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
            ),
            array(
                'option_group' => 'cptmr_plugin_settings',
                'option_name'  => 'chat_manager',
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
        $args = array(
            array(
                'id'       => 'cpt_manager',
                'title'    => 'Activate CPT Manager',
                'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                'page'     => 'cptmmr_plugin',
                'section'  => 'cptmr_admin_index',
                'args'     => array(
                    'labels_for' => 'cpt_manager',
                    'class'      => 'ui-toggle',
                    'data-toggle'=> 'toggle'
                )
                ),
            array(
                'id'       => 'taxonomy_manager',
                'title'    => 'Activate Taxonomy Manager',
                'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                'page'     => 'cptmmr_plugin',
                'section'  => 'cptmr_admin_index',
                'args'     => array(
                    'labels_for' => 'taxonomy_manager',
                    'class'      => 'ui-toggles',
                    'data-toggle'=> 'toggle'
                )
                ),
                array(
                    'id'       => 'media_widget',
                    'title'    => 'Activate Media Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'media_widget',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                ) ,
                array(
                    'id'       => 'gallery_manager',
                    'title'    => 'Activate Gallery Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'gallery_manager',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                ) ,
                array(
                    'id'       => 'testimonial_manager',
                    'title'    => 'Activate Testimonials Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'testimonial_manager',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                ) ,
                array(
                    'id'       => 'templates_manager',
                    'title'    => 'Activate Templates Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'templates_manager',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                ) ,
                array(
                    'id'       => 'login_manager',
                    'title'    => 'Activate Login Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'login_manager',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                ) ,
                array(
                    'id'       => 'membership_manager',
                    'title'    => 'Activate Memebership Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'membership_manager',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                    ), 
                array(
                    'id'       => 'chat_manager',
                    'title'    => 'Activate Chat Manager',
                    'callback' => array( $this->callbacks_mngr , 'checkboxField' ),
                    'page'     => 'cptmmr_plugin',
                    'section'  => 'cptmr_admin_index',
                    'args'     => array(
                        'labels_for' => 'chat_manager',
                        'class'      => 'ui-toggle',
                        'data-toggle'=> 'toggle'
                    )
                )     
        );

        $this->settings->setFields( $args );
    }     

}
?>