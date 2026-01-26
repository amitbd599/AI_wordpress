<?php

register_activation_hook( plugin_dir_path(__DIR__), function(){
    if(!\Theme_Register::TS_is_theme_registered()){
        deactivate_plugins( 'ts-core/ts-core-helper.php' );
        wp_redirect(admin_url( 'plugins.php' ));
        die();
    }
});

add_action('admin_init','checked_theme_register');
function checked_theme_register(){
    if(!\Theme_Register::TS_is_theme_registered()){
        deactivate_plugins( 'ts-core/ts-core-helper.php' );
        wp_redirect(admin_url( 'plugins.php' ));
        die();
    }
}
