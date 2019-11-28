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

   public function AddPages( array $pages)
   {
       $this->admin_pages = $pages;
       return $this;
   }

   public function withSubPages( string $tile = null )
   {
      if( empty( $this->admin_pages)){
          return $this;
      }  
    
      $admin_pages = $this->admin_pages[0]; 

      $subpages = array(
          array(
            'parent_slug'=> $admin_pages['menu_slug'],  
            'page_title' => $admin_pages['page_title'],
            'menu_title' => $admin_pages['menu_title'],
            'capability' => $admin_pages['capability'],
            'menu_slug'  => $admin_pages['menu_slug'],
            'callback'   => $admin_pages['callback']
          ),
      );

      $this->admin_subpages = $subpages;

      return $this;
   }

   public function addSubPages ( $page )
   {
       $this->admin_subpages = array_merge( $this->admin_subpages, $page);

       return $this;
   }

   public function addAdminMenu()
   {
       foreach( $this->admin_pages as $page ){
           add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
       }

       foreach( $this->admin_subpages as $page ){
           add_submenu_page($page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
       }
   }
}
?>