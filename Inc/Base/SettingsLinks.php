<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

class SettingsLinks {

    protected  $plugin;

    public function __construct()
    {
        $this->plugin = PLUGIN;
    }

    /**
     * Main method to register class specific services
     * @return void
     */
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", array( $this,'settingLinks') );
    }
    
    /**
     * Return settings links
     *
     * @param mixed $links
     * @return void
     */
    public function settingLinks( $links )
    {
        $settings_link = '<a href="admin.php?page=cptmmr_plugin">Settings</a>';
        array_push($links,$settings_link);
        return $links;
    
    }
}
?>