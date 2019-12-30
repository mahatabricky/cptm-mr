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
 * Set custom post type settings
 *
 * @return void
 */

    public function setSettings()
    {
        
        $args = array(
                  array(
                    'option_group' => 'cptmr_cpt_settings',
                    'option_name'  => 'cptmmr_cpt_settings',
                    'callback'     => array( $this->callbacks_mngr , 'checkboxSanitize' )
                    )
               );

        $this->settings->setSettings( $args );
    }

    /**
     * Set custom post type setttings section
     * @return void 
     */

    public function setSections()
    {
        $args = array(
            array(
                'id'       => 'cptmr_cpt_index',
                'title'    => 'Custom Post Type Manager',
                'callback' => array( $this->callbacks_mngr , 'adminSectionManager' ),
                'page'     => 'cpt_manager'
            )
        );

        $this->settings->setSections( $args );
    }    

    /**
     * Set fields for storing custom post type
     *
     * @return void
     */
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

    /**
     * Retrive Custom post type option
     */

    public function storeCustomPostType()
    {
       $this->custom_post_type  = array(
           array(
            'post_type'     => 'Mahatab',
            'name'          => 'Films',
            'singular_name' => 'Film',
            'public'        => true,
            'has_archive'   => true
        
           )
        ); 
        
    } 

    /**
     * Register Custom Post Type
     */

    public function registerCustomPostType()
    {
     foreach( $this->custom_post_type as $post_type){

            register_post_type( $post_type['post_type'], array(

                'labels' => array (
                    'name' => $post_type['name'],
                    'singular' => $post_type['singular_name']
                ),
                'public' => $post_type['public'],
                'has_archive' => $post_type['has_archive'],

            ) 
        );

     }

        
    }




       
    
}