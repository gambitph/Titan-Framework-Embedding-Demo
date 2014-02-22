<?php
/*
Plugin Name: Titan - EMBED TEST
Plugin URI: http://titanframework.net/embed
Description: Embed testing
Author: Benjamin Intal, Gambit
Version: 0.1
Author URI: http://gambit.ph
*/


/*
 * When using the embedded framework, use it only if the framework
 * plugin isn't activated.
 */

// Don't do anything when we're activating a plugin to prevent errors
// on redeclaring Titan classes
if ( ! empty( $_GET['action'] ) && ! empty( $_GET['plugin'] ) ) {
    if ( $_GET['action'] == 'activate' ) {
        return;
    }
}
// Check if the framework plugin is activated
$useEmbeddedFramework = true;
$activePlugins = get_option('active_plugins');
if ( is_array( $activePlugins ) ) {
    foreach ( $activePlugins as $plugin ) {
        if ( is_string( $plugin ) ) {
            if ( stripos( $plugin, '/titan-framework.php' ) !== false ) {
                $useEmbeddedFramework = false;
                break;
            }
        }
    }
}
// Use the embedded Titan Framework
if ( $useEmbeddedFramework ) {
    require_once( plugin_dir_path( __FILE__ ) . 'titan-framework/titan-framework.php' );
}


/*
 * Start your Titan code below
 */

$titan = TitanFramework::getInstance( 'embed-testing' );

$panel = $titan->createAdminPanel( array(
    'name' => 'Embed Test',
) );
$panel->createOption( array(
    'name' => 'Upload',
    'id' => 'uploaded_photo',
    'type' => 'upload',
) );
$panel->createOption( array(
    'name' => 'Select Color Palette',
    'id' => 'color_palette',
    'type' => 'radio-palette',
    'options' => array(
        array(
            "#333333",
            "#888888",
            "#aaaaaa"
        ),
        array(
            "#3498db",
            "#1abc9c",
            "#e74c3c",
        ),
        array(
            "#1cafe7",
            "#fec7a8",
            "#e57ca6"
        ),
        array(
            "#efa6ea",
            "#e9ac43",
            "#e3a2ea"
        ),
        array(
            "#a4c3ae",
            "#a9e718",
            "#1abc9c",
            "#e74c3c",
            "#100489"
        ),
    ),
    'default' => 3,
) );
$panel->createOption( array(
    'name' => 'Editor',
    'id' => 'my_editor',
    'type' => 'editor',
    'desc' => 'Enter your content here',
) );
$panel->createOption( array(
    'type' => 'save',
) );