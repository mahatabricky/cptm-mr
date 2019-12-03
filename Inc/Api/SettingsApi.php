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

   public function registerSettings($page)
   {
       register_setting($page[option_group], $page[option_name], $page[sanitize_callback]);
   }

   public function AddAdminField()
   {
       
   }

}
?>