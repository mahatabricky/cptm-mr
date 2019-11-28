<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;


use Cptmmr\Api\SettingsApi;
use Cptmmr\Base\BaseController;
use Cptmmr\Callbacks\SettingsCallback;

class Admin extends BaseController
{
    private  $settings;

    private $pages = array();

    private $subpages  = array();

    private $callbacks;

    public function __construct()
    {
        $this->callbacks = new SettingsCallback();
    }

    // public function __construct()
    // {
    //     $this->settings = new SettingsApi ();
        
    //     $this->pages = array( 
    //              array(
    //                 'page_title' => 'Cptmmr',
    //                 'menu_title' => 'CPTMMR',
    //                 'capability' => 'manage_options',
    //                 'menu_slug'  => 'cptmmr_plugin',
    //                 'callback'   => function(){ echo '<h1>Plugin Dashboard </h1>' ;},
    //                 'icon_url'   => 'dashicons-store',
    //                 'position'  => '110',
    //              ),
    //         );

    //     $this->subpages = array(
    //                 array(
    //                     'parent_slug' => 'cptmmr_plugin',
    //                     'page_title'  => 'Custom Post Type',
    //                     'menu_title'  => 'CPT Manager',
    //                     'capability'  => 'manage_options',
    //                     'menu_slug'   => 'cpt_manager',
    //                     'callback'    => function (){ echo "<h2>CPT Manager</h2>";}  
    //                 ),
    //                 array(
    //                     'parent_slug' => 'cptmmr_plugin',
    //                     'page_title'  => 'Taxonomies Manager',
    //                     'menu_title'  => 'Taxonomies',
    //                     'capability'  => 'manage_options',
    //                     'menu_slug'   => 'taxonomies_manager',
    //                     'callback'    => function (){ echo "<h2>Taxonomies Manager</h2>";}  
    //                 ),
    //                 array(
    //                     'parent_slug' => 'cptmmr_plugin',
    //                     'page_title'  => 'Widget Managaer',
    //                     'menu_title'  => 'Widget',
    //                     'capability'  => 'manage_options',
    //                     'menu_slug'   => 'widget_manager',
    //                     'callback'    => function (){ echo "<h2>Widget Managaer</h2>";}  
    //                 ),
    //             );    
    
    // }

   
    public function register()
    {

        $this->settings = new SettingsApi ();

        $this->pages = $this->addAdminPages();

        $this->subpages = $this->addAdminSubPages();

        $this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }


    public function addAdminPages()
    {
    
       return $pages = array( 
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

    public function addAdminSubPages()
    {

        return $subpages = array(
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

}
?>