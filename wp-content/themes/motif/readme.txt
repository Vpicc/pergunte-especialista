=== Motif ===
Contributors: automattic
Tags: gray, red, white, light, two-columns, right-sidebar, custom-colors, responsive-layout, custom-background, custom-menu, featured-images, full-width-template, microformats, rtl-language-support, sticky-post, translation-ready

Requires at least: 3.8
Tested up to: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Source for the photo on the screenshot: https://unsplash.com/

== Frequently Asked Questions ==

= How to setup the front page like the demo site? =

The demo site URL: https://motifdemo.wordpress.com/?demo

1. Create or edit a page, and assign it to the Front Page template from the Page Attributes module.
2. Go to Settings > Reading and set "Front page displays" to "A static page".
3. Select the page you just assigned the Front Page template to as "Front page" and then choose another page as "Posts page" to serve your blog posts.
4. Make sure you add a featured image to your front page. This image will be shown in the large hero area below the top menu.

The front page also can display widgets and two testimonials. The page has two dedicated widget areas, First Front Page Sidebar and Second Front Page Sidebar. You can add as many as widgets you want!

Below the widget areas, two randomly chosen testimonials (see below) will be displayed. All you need to do is add at least two testimonials, and you're all set.

= How to use the grid page template? =

Another useful page template is the grid template. It's great for a portfolio page, a case study page, or a page to introduce your team members.

1. Create or edit a page, and assign it to the Grid Page template from the Page Attributes module. This placeholder page will be used to display a small blurb and thumbnail image for each of the child pages (aka sub-pages) you'll create next.
2. Create additional pages that you want to show on the grid page you've just created above. In the Page Attributes box on each child page, select the grid page you created above as the parent page.
3. For the best result, make sure you add a featured images to each child page, so it'll be displayed above the blurb on the main grid page.

= I don't see the Testimonials menu in my admin, where can I find it? =

To make the Testimonials menu appear in your admin, you need to install the [Jetpack plugin](http://jetpack.me) because it has the required code needed to make [custom post types](http://codex.wordpress.org/Post_Types#Custom_Post_Types) work for the Motif theme.

Once Jetpack is active, the Testimonials menu will appear in your admin, in addition to standard blog posts. No special Jetpack module is needed and a WordPress.com connection is not required for the Testimonials feature to function. Testimonials will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

On your site, two randomly chosen testimonials appear on the front page template so that every testimonial has an equal chance to be there. All testimonials are displayed in a testimonial archive page.

= Where is the page that lists all testimonials? =

Let's say you have a WordPress site at: http://mygroovydomain.com

The URL of the testimonial archive page will be: http://mygroovydomain.com/testimonial/

You'll need pretty permalinks (any structure) for this URL to work though. If you're stuck with default permalinks - your links have a query string at the end, like ?p=123 - then your testimonial archive can be accessed by adding this immediately after your URL:

`/?post_type=jetpack-testimonial`

= How to customize the testimonial archive page? =

Once you have published a testimonial, under the Testimonials menu in your admin, you will see a link that takes you to the Customizer where you can edit the page title, add an intro text and a featured image. Just make sure you have pretty permalinks (any structure) for this to work.

== Quick Specs (all measurements in pixels) ==

	1.	On single posts and the default page template the main column maximum width is 705.
	2.	On the full width and grid page templates the main column maximum width is 1072.
	3.	The featured image on the homepage works best with images at least 1140 wide.

== Changelog ==

= 11 December 2015 =
* Removing title tag filter; should have been removed when Title Tag support was added -

= 8 December 2015 =
* replacing wp_title with title tag support. Updating version number and readme.

= 20 November 2015 =
* Disable share buttons on testimonial posts. Closes #3427

= 14 August 2015 =
* update readme.txt; bumping theme version number.
* adding an isset check to the testimonial page content;

= 31 July 2015 =
* Remove .`screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 16 June 2015 =
* Fix submenu floating for RTL on mobile devices;

= 30 April 2015 =
* Added styling for Jetpack testimonials shortcode; Bumped up the version number; Updated readme.txt;

= 17 December 2014 =
* Allow tablets to access submenu items in the site navigation.

= 12 November 2014 =
* Fix demo site URL in readme.txt.
* Remove Domain Path in languages, as it corresponds to the default.
* Add readme.txt.
* Use correct .gallery-caption class instead of .gallery dd selector.

= 2 November 2014 =
* Add Jetpack prefixing to Site Logo template tags.

= 11 August 2014 =
* Revert last commit; still having issues with committing to one theme area
* Main navigation & header styling, vertical rhythm, blog index view
* Revert last update
* Main navigation & header styling, vertical rhythm, blog index view

= 8 August 2014 =
* Revert mistaken commit
* Initial commit

= 5 August 2014 =
* Echo custom Testimonials archive title;

= 24 July 2014 =
* change theme/author URIs and footer links to `wordpress.com/themes`.

= 22 July 2014 =
* Add theme support for Site Logo.

= 1 June 2014 =
* add/update pot files.

= 30 May 2014 =
* Text and link update footer credit.

= 13 April 2014 =
* Make Custom Header width and height flexible.

= 17 March 2014 =
* Ensure inputs in widget areas have a contrasting background color so they don't blend in.

= 23 January 2014 =
* don't translate user input in page title output.

= 21 January 2014 =
* Move WP.com specific styles into a separate file that is enqueued from wpcom.php.
* Correct row calculation on grid page template, to avoid misaligned grid items.

= 17 January 2014 =
* Closed #page div.

= 13 January 2014 =
* Add support for manual excerpts to pages, to allow users to customize the Grid Page better.

= 10 January 2014 =
* Display tagline by default.

= 2 January 2014 =
* Align tags in style.css with the terms of the Theme Showcase.

= 30 December 2013 =
* Update screenshot with new featured image.

= 20 December 2013 =
* Remove the CSS for hiding the post title on the Aside post format. This is now handled in PHP.
* Updated RTL styles after the inclusion of post format support.
* Rename widget areas to avoid direction-based names, which can lead to confusion for RTL languages.
* Align password input with submit button on password protected posts.
* Style trackbacks.
* Add styling for the Flickr widget.
* Fix vertical alignment on Author widget text.
* Update header.php to reflect the new custom logo implementation using the custom header feature.
* Add support for the aside, gallery, image, link, quote and video post formats.

= 19 December 2013 =
* Remove underline effect from hover states of post, page and pagination navigation.
* Add Custom Header support.

= 18 December 2013 =
* Remove custom logo theme option.
* Add post format icons and archive links to the post meta.
* Replace 'Sticky' with 'Featured' in the post meta, as this wording is clearer for users.
* Add a comma in the theme description (Oxford comma).
* Add comment text for translators, to explain how to turn the use of Google fonts on or off.
* Replace has_post_thumbnail() calls to account for a specific bug with the function.
* Move the $themecolors array into the motif_add_wpcom_support() function to hook it into after_setup_theme
* Remove the include call to inc/wpcom.php in functions.php, as this is done automatically on WP.com.
* Remove duplicate call to add post thumbnails theme support.

= 17 December 2013 =
* Remove unused options.php file.
* Add underline effect to hovered links.
* Move the text container of the featured area on the homepage to the bottom. This should make it easier to find featured images that fit.
* Reduce Testimonial thumbnail size.
* Update theme tags.

= 16 December 2013 =
* Fix a bug in the dropdown menus in which submenus of current pages would lose the hover effects.
* Center WP Stats smiley and add margin.
* Update screenshot.
* Add RTL styles.
* Fix Hero Image responsiveness and Contact Widget spacing.
* Add editor styles.
* Remove old editor styles.
* rename category count transient.
* Correct two text domains.

= 13 December 2013 =
* Correct responsive CSS styles for Testimonials.
* Refactor the Testimonials Archives to work with Infinite Scroll.
* Further clean up of style.css to make it easier to fix bugs in RTL mode.
* Refactor motif_infinite_scroll_has_footer_widgets() function, to make it clearer that it is hooked to a filter and filtering a variable.

= 10 December 2013 =
* Add support for Infinite Scroll.
* fix styling of Good Reads and Recent Comments widgets.
* More consistent font-sizes in style.css
* consistently use double quotes to surround font names in style.css

= 8 December 2013 =
* Add styles for About page gravatar profile.
* Add basic styles for Jetpack Comments as well as Shares and Likes

= 6 December 2013 =
* update Width terms to Layout.

= 2 December 2013 =
* Clean up style.css

= 5 October 2013 =
* Add missing page templates, small clean up

= 23 September 2013 =
* clean up functions.php and inc/ files. Add a file with WP.com specific functionality.

= 21 September 2013 =
* Add responsive styles.
* removed unused full width and portofolio templates.
* Add various page templates and related files.
* Add Javascript files for the customizer and navigation tweaks.
* remove unused Javascript files.
* remove unused files in includes folder.
* Bulk update files to remove any occurances of references to Paradigm. Add Customizer and Jetpack support files that go along.
* remove no longer used images, add background texture image for the body.

= 19 September 2013 =
* Paradigm is now Motif
* Motif/Paradigm: We've forked the paradigm theme henceforth know as motif; props frankklein for the name
