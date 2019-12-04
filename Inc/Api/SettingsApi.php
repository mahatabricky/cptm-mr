<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Api;

class SettingsApi 
{
    public $admin_pages = array();

    public $admin_subpages = array ();

    public function register()
    {
        if( !empty( $this->admin_pages) ){
            add_action('admin_menu',array($this,'addAdminMenu'));
        }
    }

/**
 *  Add new admin page
 * @param array $pages
 * return void
 */

   public function AddPages( array $pages)
   {
       $this->admin_pages = $pages;
       return $this;
   }

/**
 * With subpages
 *
 * @param string $title
 * @return void
 */

   public function withSubPages( string $title = null )
   {
      if( empty( $this->admin_pages)){
          return $this;
      }  
    
      $admin_pages = $this->admin_pages[0]; 

      $subpages = array(
          array(
            'parent_slug'=> $admin_pages['menu_slug'],  
            'page_title' => $admin_pages['page_title'],
            'menu_title' => ($title) ? $title : $admin_pages['menu_title'],
            'capability' => $admin_pages['capability'],
            'menu_slug'  => $admin_pages['menu_slug'],
            'callback'   => $admin_pages['callback']
          ),
      );

     $this->admin_subpages = $subpages;

      return $this;
   }
/**
 * Add new admin subpages
 *
 * @param array $page
 * @return void
 */
   public function addSubPages ( $page )
   {
       $this->admin_subpages = array_merge( $this->admin_subpages, $page);

       return $this;
   }

/**
 * Add admin menu with submenus
 *
 * @return void
 */

   public function addAdminMenu()
   {
       foreach( $this->admin_pages as $page ){
           add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
       }

       foreach( $this->admin_subpages as $page ){
           add_submenu_page($page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
       }
   }

//    public function registerSettings($option)
//    {
//        register_setting($option['option_group'], $option['option_name'], $option['sanitize_callback']);
//    }

//    public function AddSettingsSection($section)
//    {
//         add_settings_section($section['id'], $section['title'], $section['callback'], $section['page']);
//    }

//    public function AddSettingsField($field)
//    {
//        add_settings_field($field['id'], $field['title'], $field['callback'], $field['page'], $field['section'], $field['args']);
//    }

     public function registerCustomFields()
     {
         // Register settings
         register_setting( $setting["option_group"], $setting["option_name"],
                 (isset ( $setting["callback"] ) ? $setting["callback"] : '' ) 
                );

         // add settings section

         add_settings_section( $section["id"], $section["title"],
                    (isset ( $section["callback"] ) ? $section["callback"] : '' ),
                    $section["page"]
                );

         // add settings field

         add_settings_field( $field["id"], $field["title"],
                    (isset ( $field["callback"] ) ? $field["callback"] : '' ),  
                    $field["page"], $field["section"], 
                    (isset ( $field["args"] ) ? $field["args"] : '' )
                );

     }

}
?>