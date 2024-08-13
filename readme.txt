=== Fabric Calculator WP ===
Contributors: dipendrapancholi
Tags: fabric, textile, material, measurements, cutting
Requires at least: 5.0
Tested up to: 6.6
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A plugin to calculate the best way to cut fabric pieces from a given material.

== Description ==

**Fabric Calculator WP** is a powerful yet easy-to-use WordPress plugin designed to help you calculate the most efficient way to cut fabric pieces from a given material. Whether you're a designer, tailor, or DIY enthusiast, this plugin makes it easy to plan your fabric cuts with precision.

**Key Features:**

* Input material dimensions (width and height) and the desired piece dimensions.
* Calculate the optimal number of cuts and layout.
* Visual preview showing how the fabric will be cut.
* Frontend shortcode `[fabric_calculator]` with customizable parameters.
* Backend settings for default form values and result text.

**Shortcode Parameters:**

- `heading`: Custom heading for the form.
- `material_width`: Default material width.
- `material_height`: Default material height.
- `piece_width`: Default piece width.
- `piece_height`: Default piece height.
- `measurement`: Units of measurement (e.g., cm, meter, feet).

**Backend Settings Include:**

- Form Heading
- Measurement Units
- Default Material Width and Height
- Default Piece Width and Height
- Customizable Result Text

This plugin is ideal for anyone involved in textiles, fashion design, or DIY fabric projects who needs to optimize their fabric usage.

== Installation ==

1. Upload the `fabric-calculator-wp` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the shortcode `[fabric_calculator]` on any page or post to display the fabric calculator form.

== Frequently Asked Questions ==

= How do I use the Fabric Calculator WP? =

Simply use the shortcode `[fabric_calculator]` on your page or post. You can customize the form using the available parameters, or set default values in the plugin's settings.

= What if I don't use any parameters in the shortcode? =

If no parameters are specified in the shortcode, the form will use the default values set in the plugin's backend settings.

= Can I customize the measurement units? =

Yes, you can set the default measurement units in the plugin's settings, or specify them directly in the shortcode using the `measurement` parameter.

== Screenshots ==

1. Frontend form with Visual preview of fabric cuts.
2. Backend settings page.

== Changelog ==

= 1.0.0 =
* Initial release of Fabric Calculator WP.

== Upgrade Notice ==

= 1.0.0 =
* First release. Upgrade for new features and improvements.