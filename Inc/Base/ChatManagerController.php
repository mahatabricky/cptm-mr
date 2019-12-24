<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class ChatManagerController extends BaseController
{

    public $subpages = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        $managers = array_keys ( $this->managers);

        $cpt_option = get_option('cptmmr_plugin');

        $cpt_checked = ($cpt_option[$managers['8']]) ? true : false;  // 8 index indicates chat_manager keys

        if(! $cpt_checked){

            return;

        }

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages( $this->subpages )->register();

      //  add_action('init', array( $this,'activate'));

    }

    // public function activate()
    // {
    //      register_post_type( 'movies',
    // // CPT Options
    //             array(
    //                 'labels' => array(
    //                     'name' => __( 'Movies' ),
    //                     'singular_name' => __( 'Movie' )
    //                 ),
    //                 'public' => true,
    //                 'has_archive' => true,
    //                 'rewrite' => array('slug' => 'movies'),
    //             )
    //         );
    // }

    public function setSubPages()
    {

         $this->subpages = array(
            array(
                'parent_slug' => 'cptmmr_plugin',
                'page_title'  => 'Chat Manager',
                'menu_title'  => 'Chat Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'chat_manager',
                'callback'    => array($this->callbacks,'chatTemplates')  
            ),
           
        );    
    }


       
    
}