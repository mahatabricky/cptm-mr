<?php
/**
 * mahatab/cptm-mr
 */
namespace Cptmmr;

final class Init {

    /**
     * Store all the classes inside an array
     * @return array full list of classes
     */

    public static function get_services(){
        return [
            Pages\Admin::class, // 
            Base\Enqueue::class, // Register Enqueue class to load all scripts files
        ];
    }
    
    /**
     *Loop through the classes ,initialized them
     *and call the register() method if it exixts
     * @return
     */
    public static function register_services(){
          foreach( self::get_services() as $class){
              $service = self::instantiate( $class);
              if(method_exists($service,'register')){
                  $service->register();
              }
          }
        
    }
    /**
     * Initialized the class
     * @param class $class class from the service array
     * @return class instance  new instance of the class
     */

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }

    
}
?>