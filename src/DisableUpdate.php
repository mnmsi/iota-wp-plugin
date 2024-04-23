<?php
namespace App;
class DisableUpdate
{
    public function activate()
    {
        add_action('init', array($this, 'remove_core_updates'));
        add_filter('pre_site_transient_update_core', array($this, 'remove_core_updates'));
        add_filter('pre_site_transient_update_plugins', array($this, 'remove_core_updates'));
        add_filter('pre_site_transient_update_themes', array($this, 'remove_core_updates'));
        add_filter( 'auto_update_plugin', '__return_false' );
        add_filter( 'auto_update_theme', '__return_false' );
        define( 'WP_AUTO_UPDATE_CORE', false );
    }
    public function remove_core_updates()
    {
        global $wp_version;
        return(object) array(
            'last_checked' => time(),
            'version_checked' => $wp_version,
        );
    }
}

