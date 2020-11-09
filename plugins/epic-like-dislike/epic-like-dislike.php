<?php
/*
*   Plugin Name: Epic Like/Dislike
*   Author:      Sanaullah 
*   Description: Simple post anout like and dislike 
*   Version:     1.0.0
*   License:     GPL2
*   License URI: https://www.gnu.org/licenses/gpl-2.0.html
*   Text Domain: epic-aclike 
*/
// function mytheme_custom_excerpt_length( $length ) {
//     return 10;
// }
// add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );
// abort if anyone access this file directly
if( !defined( 'WPINC' )){
    die;
}
// define version constant and used when needed
if( !defined( 'WPAC_PLUGIN_VERSION' )){
    define( 'WPAC_PLUGIN_VERSION','1.0.0' );
}
// define directory constant and used when needed 
if( !defined( 'WPAC_PLUGIN_DIR' )){
    define( 'WPAC_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );
}
// check this function if exist ? 
if( !function_exists( 'epic_myplugin_scripts' )){
    function epic_myplugin_scripts() {
        wp_enqueue_style( 'epic-css', WPAC_PLUGIN_DIR.'assets/css/main.css');
        wp_enqueue_script( 'epic-js', WPAC_PLUGIN_DIR.'assets/js/main.js', 'jQuery', '1.0.0', true );
    }
    add_action( 'wp_enqueue_scripts','epic_myplugin_scripts' );
}
function epic_setting_page_html(){
    if( !is_admin() ){
        return;
    }
    ?>
        <div class="wrap">
            <form action="option.php" method="post">
                <?php 
                    settings_fields( 'epic-settings' );
                    db_settings_section( 'epic-settings' );
                    submit_button( 'Save changes' )
                ?>
            </form>
        </div>
    <?php
}
// function epic_register_menuin_sidebar(){
//     add_menu_page('Epic like Dislike','Epic setting', 'manage_options','epic-setting','epic_setting_page_html', 'dashicons-thumbs-up', 20);
// }
// add_action( 'admin_menu','epic_register_menuin_sidebar' );

// function epic_register_menuin_sidebar(){
//     add_options_page( 'Epic like Dislike','Epic Setting', 'manage_options','epic-setting','epic_setting_page_html',20 );
// }
// add_action( 'admin_menu','epic_register_menuin_sidebar' );

function epic_plugin_settings(){
    register_setting( 'epic-settings', 'Epic_like_btn_label' );
    register_setting( 'epic-settings', 'Epic_dislike_btn_label' );
    add_settings_section( 'epic_label_settings_section', 'Epic Button Labels', 'epic_plugin_settings_section_cb', 'epic-settings' );
    add_settings_field( 'epic_like_label_field', 'Like Button Labels', 'epic_like_label_field_cb', 'epic-settings', 'epic_label_settings_section' );
    
}
add_action( 'admin_init','epic_plugin_settings' );

function epic_plugin_settings_section_cb(){
    echo '<button> Define Button Labels </button>';
}

// field content cb
function epic_like_label_field_cb() {
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('Epic_like_btn_label');
    // output the field
    ?>
    <input type="text" name="Epic_like_btn_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}





?>