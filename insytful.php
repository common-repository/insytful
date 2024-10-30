<?php
/*
 * Plugin Name: Insytful
 * Description: Adds Insytful meta tags for deep-linking support to the head section of your site.
 * Version: 1.0
 * Author: Zengenti
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Disallows direct file access.

// Add settings link on plugin page
function insytful_meta_tags_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=insytful-meta-tags">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'insytful_meta_tags_settings_link');

// Create settings page
function insytful_meta_tags_create_menu() {
    add_options_page(
        'Insytful Meta Tags Settings',
        'Insytful Meta Tags',
        'manage_options',
        'insytful-meta-tags',
        'insytful_meta_tags_settings_page'
    );
}
add_action('admin_menu', 'insytful_meta_tags_create_menu');

function insytful_meta_tags_settings_page() {
    ?>
    <div class="wrap">
        <h1>Insytful Meta Tags Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('insytful-meta-tags-settings-group');
            do_settings_sections('insytful-meta-tags-settings-group');
            ?>
            <table class="form-table">
                <tr valign="top">
                <th scope="row">Enable Insytful created/updated dates</th>
                <td><input type="checkbox" name="insytful_enable_dates" value="1" <?php checked(1, get_option('insytful_enable_dates'), true); ?> /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function insytful_meta_tags_register_settings() {
    register_setting('insytful-meta-tags-settings-group', 'insytful_enable_dates');
}
add_action('admin_init', 'insytful_meta_tags_register_settings');

function insytful_page_meta_tag()
{
    if (is_singular()) {
        $id = get_the_ID();
        echo '<meta name="IDL:PageId" content="' . esc_attr($id) . '" />' . "\n";
    }

    if (is_single() || is_page()) {
        global $post;
        $created_date = get_the_date('c', $post->ID);
        $modified_date = get_the_modified_date('c', $post->ID);

        if (is_single()) {
            echo '<meta property="article:published_time" content="' . esc_attr($created_date) . '"/>' . "\n";
            echo '<meta property="article:modified_time" content="' . esc_attr($modified_date) . '"/>' . "\n";
        }

        if (is_page()) {
            echo '<meta name="dcterms.created" content="' . esc_attr($created_date) . '"/>' . "\n";
            echo '<meta name="dcterms.modified" content="' . esc_attr($modified_date) . '"/>' . "\n";
        }
    }
}

add_action('wp_head', 'insytful_page_meta_tag');
