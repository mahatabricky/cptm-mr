<?php
/**
 * Base Controller class 
 */
namespace Cptmmr\Base;

use Cptmmr\Pages\Admin\AdminPage;
use Cptmmr\Pages\TestPage;

class BaseController {

   protected $classes;

   public function register(){
        $this->institiate();
   }

    protected function registerClass()
    {
        return [
            AdminPage::class,
            TestPage::class,
        ];
    }
    protected function institiate()
    {
        
        foreach($this->classes = $this->registerClass() as $class){
            $class = new $class();
        }
    }

}
?>