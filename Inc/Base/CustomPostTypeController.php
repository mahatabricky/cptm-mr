<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\CptCallbacks;
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

        $this->cpt_callbacks = new CptCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages( $this->subpages )->register();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

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
                    'option_name'  => 'cptmmr_cpt',
                    'callback'     => array( $this->cpt_callbacks , 'cptSanitize' )
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
                'callback' => array( $this->cpt_callbacks , 'cptSectionManager' ),
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
        
        $args = array(
            array(
                'id'       => 'post_type',
                'title'    => 'Custom Post Type ID',
                'callback' => array( $this->cpt_callbacks , 'textField' ),
                'page'     => 'cpt_manager',
                'section'  => 'cptmr_cpt_index',
                'args'     => array(
                    'option_name'=> 'cptmmr_cpt',
                    'labels_for' => 'post_type',
                    'class'      => 'ui-toggle',
                    'data-toggle'=> 'toggle'
                )
            ),
        );
     

        $this->settings->setFields( $args );
    }     

    /**
     * Retrive Custom post type option
     */

    public function storeCustomPostType()
    {
    //    $this->custom_post_type  = array(
    //        array(
    //         'post_type'     => 'Mahatab',
    //         'name'          => 'Films',
    //         'singular_name' => 'Film',
    //         'public'        => true,
    //         'has_archive'   => true       
    //        )
    //     ); 

        $this->custom_post_type []= array(
            'post_type'   => 'test',
            'name' => '',
            'singular_name' => '',
            'add_new' => '',
            'add_new_item' => '',
            'edit_item' => '',
            'new_item' => '',
            'view_item' => '',
            'view_items' => '',
            'search_items' => '',
            'search_items' => '',
            'search_items' => '',
            'search_items' => '',
            'search_items'  => '',
            'archives' => '',
            'attributes' => '',
            'insert_into_item' => '',
            'uploaded_to_this_item' => '',
            'featured_image' => '',
            'set_featured_image' => '',
            'remove_featured_image' => '',
            'use_featured_image' => '',
            'menu_name' => '',
            'filter_items_list' => '',
            'items_list_navigation' => '',
            'items_list' => '',
            'item_published' => '',
            'item_published_privately' => '',
            'item_reverted_to_draft' => '',
            'item_scheduled' => '',
            'item_updated' => '',
            'description' => '',
            'public' => '',
            'hierarchical' => '',
            'exclude_from_search' => '',
            'publicly_queryable' => '',
            'show_ui' => '',
            'show_in_menu' => '',
            'show_in_nav_menus' => '',
            'show_in_admin_bar' => '',
            'show_in_admin_bar' => '',
            'rest_base' => '',
            'rest_controller_class' => '',
            'menu_position' => '',
            'menu_icon' => '',
            'capability_type' => '',
            'capabilities' => '',
            'map_meta_cap' => '',
            'map_meta_cap' => '',
            'register_meta_box_cb' => '',
            'taxonomies' => '',
            'has_archive' => true,
            'rewrite' => '',
            'slug' => '',
            'with_front' => '',
            'feeds' => '',
            'pages' => '',
            'ep_mask' => '',
            'query_var' => '',
            'can_export' => '',
            'delete_with_user' => '',
            '_builtin' => '',
            '_edit_link' => '',            
        );
        
    } 

    /**
     * Register Custom Post Type
     */

    public function registerCustomPostType()
    {
        echo "<pre>";
        var_dump($this->custom_post_type);
        echo "</pre>";

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