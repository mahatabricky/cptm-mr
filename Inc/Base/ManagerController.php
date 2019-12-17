<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;
use Cptmmr\Api\SettingsApi;
use Cptmmr\Callbacks\AdminCallbacks;
use Cptmmr\Callbacks\ManagerCallbacks;

class ManagerController extends BaseController 
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

        $this->settings->addPages( $this->pages )->withSubPages( 'Dashboard' )->addSubPages( $this->subpages )
        ->register();

    }


}
?>