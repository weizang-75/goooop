=== List Child Pages Shortcode ===
Contributors: douglaskarr
Tags: pages, subpage, child page, childpage, short code, shortcode
Version: 1.3.1
Stable tag: 1.3.1
Tested up to: 5.2.2
Requires at least: 3.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://dknewmedia.com

A simple plugin to add list of child pages within the content of a parent page. 

== Description ==

I could not find an easy plugin that enabled me to use a shortcode that would enable me to publish a list of child pages under a parent page. So, I built one.


= Usage: =

Example 1: Order the child pages by publish date in descending order:
[listchildpages aclass="" ifempty="No child pages" orderby="publish_date" order="desc" displayimage="no"]&lt;h3&gt;Here are our child pages:&lt;/h3&gt;[/listchildpages]

Example 2: Order the child pages by title in ascending order with the page's featured image aligned left:
[listchildpages aclass="" ifempty="No child pages" orderby="title" order="asc" displayimage="YES" align="alignleft"]&lt;h3&gt;Here are our child pages:&lt;/h3&gt;[/listchildpages]

The shortcode accepts all of the Order and Orderby Parameters listed within the [WordPress class reference](https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters).

Built by [DK New Media](http://www.dknewmedia.com), visit the [MarTech](https://martech.zone) to keep up on this plugin and other marketing tools to help you grow your online presence!

== Installation ==

1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How can I add a description for each child page? =

Edit the child page and you'll find an excerpt section where you can enter a description that will be published on the list.

= How can I enable featured images on my site? =

Within your functions.php file, look for the add_theme_support post-thumbnails line and add page to the array. Or if you don't have that line, you can just add it:

<pre>add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );</pre>

= How can I modify the output? =

There are additional class fields for the unordered list tag (ulclass), list item tag (liclass), and the anchor tag (aclass). You can modify the output utilizing your theme's CSS.

== Screenshots ==

1. View of the shortcode.
1. View of the output.

== Changelog ==

= 1.3.1 =
* Tested in latest versions of WordPress

= 1.3.0 =
* Added an option to display the featured image for the page.
* Added class outputs for the ul and li tags in addition to the anchor text.

= 1.2.2 =
* Corrected an undeclared variable error.

= 1.2.1 =
* Added documentation on where you can see all of the order and orderby parameters.

= 1.2.0 =
* Added another shortcode option for the order. Default is DESC.

= 1.1.0 =
* Added another shortcode option for the orderby. Default is publish_date.

= 1.0.0 =
* Initial Release

== Upgrade Notice ==

= 1.3.1 =
* Tested in latest versions of WordPress

= 1.3.0 =
* Added more options!

= 1.2.2 =
* Corrected an undeclared variable error.

= 1.2.1 =
* Added documentation on where you can see all of the order and orderby parameters.

= 1.2.0 =
* Added another shortcode option for the order. Default is DESC.

= 1.1.0 =
* Added another shortcode option for the order. Default is publish_date.

= 1.0.0 =
* Initial Release