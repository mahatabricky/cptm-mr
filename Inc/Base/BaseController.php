<?php
/**
 * Base Controller class 
 */
namespace Cptmmr\Base;

use Cptmmr\Pages\Admin\AdminPage;

class BaseController {


    protected function registerClass()
    {
        return [
            AdminPage::class,
        ];
    }
    
}
?>