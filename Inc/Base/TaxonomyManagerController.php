<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;

class TaxonomyManagerController extends BaseController
{

    public $subpages = array();

    public $settings ;

    public $callbacks ;

    public function register()
    {

        $managers = array_keys ( $this->managers);

        $cpt_option = get_option('cptmmr_plugin');

      //  var_dump($managers);

        $cpt_checked = ($cpt_option[$managers['1']]) ? true : false;  // 1 index indicates taxonomy_manager keys

        if(! $cpt_checked){

            return;

        }

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
                'page_title'  => 'Custom Taxonomy',
                'menu_title'  => 'Taxonomy Manager',
                'capability'  => 'manage_options',
                'menu_slug'   => 'taxonomy_manager',
                'callback'    => array($this->callbacks,'taxonomiesTemplates')  
            ),
          
        );    
    }


       
    
}