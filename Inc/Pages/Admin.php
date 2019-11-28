<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;

class Admin extends BaseController
{
    private $settings;

    private $pages = array();

    private $subpages  = array();

    public function __construct()
    {
        $this->settings = new SettingsApi ();
        $this->pages = array( 
                 array(
                    'page_title' => 'Cptmmr Plugin',
                    'menu_title' => 'CPTMMR Plugin',
                    'capability' => 'manage_options',
                    'menu_slug'  => 'cptmmr_plugin',
                    'callback'   => function(){ echo 'this is it ';},
                    'icon_url'   => 'dashicons-store',
                    'position'  => '110',
                 ),
            );
    
    }

    public function register()
    {

        $this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->register();
    }

}
?>