<?php
/*
 * Plugin Name: WP Plugin Self Hosted Test
 * Plugin URI: https://github.com/thore-hph/wp-plugin-self-hosted-test
 * Description: Test plugin for self hosted WordPress plugins
 * Version: 1.0.1
 * Author: Thore Janke (thore@homepage-helden.de)
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'WP_PLUGIN_SELF_HOSTED_TEST_BASENAME', plugin_basename( __FILE__ ) );

// Plugin Updater
require_once __DIR__ . '/plugin-updater/class-updater-checker.php'; // Use your path to file

// Use your namespace
use HomepageHelden\Updater_Checker;

$github_username = 'thore-hph';
$github_repository = 'wp-plugin-self-hosted-test';
$plugin_basename = WP_PLUGIN_SELF_HOSTED_TEST_BASENAME;
$plugin_current_version = '1.0.1';

$updater = new Updater_Checker(
    $github_username,
    $github_repository,
    $plugin_basename,
    $plugin_current_version
);
$updater->set_hooks();

// We add a note to the admin dashboard that says "Hello World!"
function wp_plugin_self_hosted_test_admin_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Hello World! Does this work?', 'wp-plugin-self-hosted-test' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'wp_plugin_self_hosted_test_admin_notice' );
