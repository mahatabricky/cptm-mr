<?php
/**
 * mahatab/cptm-mr
 */
namespace Cptmmr;

use Cptmmr\Base\BaseController;

final class Init extends BaseController{
    public $plugin_name;
    
    public function initPlugin(){
            $this->register();
    }

    
}
?>