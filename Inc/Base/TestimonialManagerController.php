<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class TestimonialManagerController extends BaseController
{

    public $subpages = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        if ( !$this->activated('testimonial_manager') ) return;

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
                'page_title'  => 'Testimonial Manager',
                'menu_title'  => 'Testimonial Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'testimonial_manager',
                'callback'    => array($this->callbacks,'testimonialTemplates')  
            ),
    
        );    
    }
    
}