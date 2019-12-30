<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{

    public $subpages = array();

    public $custom_post_type = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        if ( !$this->activated('cpt_manager') ) return;

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages( $this->subpages )->register();

        $this->storeCustomPostType();

        if ( !empty ( $this->custom_post_type )){

             add_action('init', array( $this,'registerCustomPostType'));

        }

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
           
        );    
    }

    /**
     * Retrive Custom post type option
     */

    public function storeCustomPostType()
    {
        $this->custom_post_type [] = array(

            'name'  => 'Mahatab',
            'singular' => 'Mahatab',
        
        );
    } 

    /**
     * Register Custom Post Type
     */

    public function registerCustomPostType()
    {
        register_post_type( 'Movie', array(

            'labels' => array (
                'name' => 'Movies',
                'singular' => 'Movie'
            ),
            'public' => true,
            'has_archive' => true,

        ) );
    }




       
    
}