=== Insytful ===
Contributors: insytful
Tags: meta tags, deep linking, insytful
Requires at least: 4.6
Tested up to: 6.5
Stable tag: 1.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds Insytful meta tags for deep-linking support to the head section of your site.

== Description ==

The Insytful plugin helps you to add deep linking integration with Insytful.

Optionally you can enable other helpful metadata tags for better Insytful integration.

Example of deep link meta tags:

    <meta name="IDL:PageId" content="1" />

Example of created/updated meta tags:

    <meta property="article:published_time" content="2004-02-12T15:19:21+00:00" />
    <meta property="article:modified_time" content="2004-02-12T15:19:21+00:00" />

or


    <meta property="dcterms.created" content="2004-02-12T15:19:21+00:00" />
    <meta property="dcterms.modified" content="2004-02-12T15:19:21+00:00" />

== Installation ==

1. Upload the `insytful` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to 'Settings' -> 'Insytful Meta Tags' to configure the plugin.

== Frequently Asked Questions ==

= How do I enable or disable the inclusion of created and modified dates? =

Go to `Settings` -> `Insytful Meta Tags` and check or uncheck the box for enabling Insytful created/updated dates. Then click `Save Changes`.

= What meta tags are added to my site? =

The plugin adds meta tags for the page ID, created date, and modified date, which can be used for deep-linking and enhanced indexing.

= Will this plugin work with any theme? =

Yes, the plugin should work with any WordPress theme that adheres to standard practices.

= Do I need to configure anything after activating the plugin? =

The plugin works out of the box, but you can configure whether to include the created and modified dates from the settings page.

== Changelog ==

= 1.0 =
* Adds "IDL" metatags to your site for "Insytful Deep Link" integration.
* Optionally adds created/updated metatags to your site.