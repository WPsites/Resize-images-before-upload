=== Resize images before upload ===
Contributors: WPsites
Tags: plupload, images, resize
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 1.8

Automatically resizes your images right in your browser, before uploading.

== Description ==

Resize your images before they are uploaded to your website (server), no need to use image editing software. Drag+drop images from your digital camera to WordPress. This plugin works best in HTML5 compatible web browsers such as Chrome or Firefox.

If your web browser does not support HTML5 then this plugin will swap your image uploader runtime to the Adobe Flash version which makes sure the resize function works across more web browsers. The side effect to this is drag+drop will be disabled since this is not supported in Flash (everything works in HTML5 compatible browsers). If you experience issues or drag+drop is more important to you than resizing images then you can disable the Flash override in your settings -> media.

This plugin does not work on the iPhone or iPad.

This plugin removes the upload file size limit and turns on the resize function.

Once this plugin is enabled your images will be resized in the browser before being uploaded to your website (server). 

This plugin adds an additional setting to your settings -> media page that allows you to specify the image quality when being resized. The quality value can range from 1-100. The higher the quality the larger the file size. The default value is 80 which reduces the file size whilst still maintaining a decent quality image. You can also set the resize dimensions for this plugin here to, if you weren't happy inheriting the default large image size settings.

* Less bandwidth used for your host when uploading your images
* No more massive images uploaded to your site for users to sit waiting to view/download
* You can drag images right off your digital camera onto the WordPress uploader, getting them online in a flash.

If you want to force the resized image width/height, overriding the media settings (making it so multisite users cannot change this value etc) you can do this in wp-config.php by setting two constants:

define( 'RIBU_RESIZE_WIDTH', 1000 ); //1000 px wide
define( 'RIBU_RESIZE_HEIGHT', 900 ); //900 px high

define( 'RIBU_RESIZE_QUALITY', 75 ); //0-100, 100 being high quality
defined( 'RIBU_MAX_UPLOAD_SIZE' '2097152b' ) ); //size in bytes

To work, any settings added to your wp-config.php file should be done above the line that reads:
/* That's all, stop editing! Happy blogging. */


Find the plugin on github: https://github.com/WPsites/Resize-images-before-upload

== Contributors ==

Simon Dunton - http://www.wpsites.co.uk


== Installation ==

1. Upload the resize-images-before-upload folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How much will this plugin reduce my image file sizes by? =

Before writing this I uploaded a photo straight from a digital camera sized at 2,969kb once resized by this plugin that photo was reduced to 620k. The image was resized to 1000 x 1000px with a quality of 100. Changing the quality to 80 resulted in a smaller file size of 200k.  You can alter these settings in your media setting.

= Does this plugin work on all browsers? =

I don't think so. This looks like part of the reason this function is left out of WordPress core.

If the web browser supports HTML5 images will be resized. For browsers without HTML5 the Adobe Flash uploader will be used. If the browser doesn't even have Flash then a message will be shown (see change log) and no automatic resizing will take place. http://www.plupload.com/ shows the uploader component features which has some further notes on browser compatibility.


== Changelog ==
= 1.8 =
* Added height/width option to settings->media

= 1.7.1 =
* Updated to confirm works with 3.6

= 1.7 =
* Make frontend adding of JS code available as an option using RIBU_FRONTEND_JS = true|false rather than default. Thanks to https://github.com/createdwithlove.

= 1.6 =
* Tweaked the list of supported browsers adding Opera and then also adding ipad/iphone just to stop the warning coming up even if people aren't uploading images on those platforms

= 1.5 =
* Removed lots of messy JS, using some new hooks. Should work from a post or from the media section with both new and old uploaders. Hopefully no more problems!

= 1.4 =
* Fix some script block issues that effected IE and possibly other browsers

= 1.3 =
* Fix typo with RIBU_RESIZE_HEIGHT define

= 1.2 =
* Fix issues with new media upload system

= 1.1 =
* Implemented new JS to check for Flash player that should work in IE
* Added not regarding this plugin not working on iPhone or iPad

= 1 =
* Fixed issues with the new media upload system and enabling the flash runtime for otherwise incompatible web browsers
* New clearer alert message for incompatable browsers that don't have Flash installed

= 0.9 =
* Added a new method for checking the max image upload size which checks the chosen function exists and falls back to ini check

= 0.8 =
* Implimented fix suggested by 'linuxplayground' for flash 404 error with query string http://wordpress.org/support/topic/suggested-small-fix?replies=2

= 0.7 =
* Added additional options that can be defined in wp-config.php for quality and max file size
* Removed the option to disable the functionality provided by this plugin on the media upload page as it seemed impossible to integrate into the new media system
* Fixed the problems with the new media upload system

= 0.6 =
* Added the ability to override the resize width and height in the wp-config.php file.
* If the user hasn't got a browser that supports HTML5 or Flash then the plugin now shows a warning message: "The Adobe Flash plug-in is required for automatic image resizing in your browser". At which point the uploader will act as normal and not try to resize images automatically.


= 0.5 =
* If the users browser is not Chrome or Firefox then we force the upload runtime to Flash which means images will be resized regardless of browser. The downside to this is drag+drop will no longer work. If drag+drop is more important to you than image resizing then you can disable this new functionality in your settings -> media.


= 0.4 =
* Added resize quality setting. You can modify the setting in the admin settings -> media

= 0.3 =
* Made this plugin resize images automatically once enabled rather than having to tick a box. The option (tick box) is still visible on the media uploader should you wish to temporarily disable this plugins functionality.
* Max upload message is now hidden when this plugin is enabled as it's not as much of an issue. The upload limit is still physically there, it's set by your web host. Your resized images just stand a much greater chance of being below this limit.

= 0.2 =
* Readme changes.

= 0.1 =
* Initial release.
