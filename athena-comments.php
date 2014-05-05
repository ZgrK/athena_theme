<?php
if ( ! function_exists('is_plugin_inactive')) {
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

if (is_plugin_inactive('disqus-comment-system/disqus.php')) {
    _e('Please install disqus comments system plugin for, comments area.','Athena-Theme');
}
?>
