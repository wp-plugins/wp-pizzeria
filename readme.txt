=== WP Pizzeria ===
Contributors: david.binda	
Tags: pizza, pizzeria, wordpress pizzeria
Requires at least: 3.4
Tested up to: 3.5.1
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Turns WordPress instalation into powerfull pizzeria site backend with ability to add pizzas, beverages and pasta. 

== Description ==

Turns WordPress instalation into powerfull pizzeria site backend with ability to add pizzas, beverages and pasta.

== Installation ==

1. Upload plugin's directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php pizza_loop(); ?>` into a copy of your archive template called archive-wp_pizzeria_pizza.php instead of default loop.
1. Place `<?php beverages_loop(); ?>` into a copy of your archive template called archive-wp_pizzeria_beverage.php instead of default loop.
1. Place `<?php pasta_loop(); ?>` into a copy of your archive template called archive-wp_pizzeria_pasta.php instead of default loop.

== Changelog ==

= 1.0.1 =
Fix Warning: in_array() [function.in-array]: Wrong datatype for second argument in ...\wp-content\plugins\wp-pizzeria\nav-menu-modifications.php on line 8
= 1.0 =
* Inital release
