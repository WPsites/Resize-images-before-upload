=== Resize images before upload ===
Contributors: WPsites
Tags: plupload, images, resize
Requires at least: 3.0
Tested up to: 3.3.1
Stable tag: 0.3

Automatically resizes your images right in your browser, before uploading.

== Description ==

Resize your images before they are uploaded to your website (server), no need to use image editing software. Drag+drop images from your digital camera to WordPress.

Plupload, the upload handler that is now utilised in WordPress has resize capabilities built in (as well as drag and drop). At this stage this functionality is not fully utilised in core, although I'm sure it will be included eventually. 

This plugin removes the upload file size limit and turns on the resize function.

Once this plugin is enabled your images will be resized in the browser before being uploaded to your website (server). You will see a new option on the media upload screen to turn on/off the resize functionality. 

* Less bandwidth used for your host when uploading your images
* No more massive images uploaded to your site for users to sit waiting to view/download
* You can drag images right off your digital camera onto the WordPress uploader, getting them online in a flash.

Find the plugin on github: https://github.com/WPsites/Resize-images-before-upload

== Contributors ==

Simon Dunton - http://www.wpsites.co.uk


== Installation ==

1. Upload the resize-images-before-upload folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How much will this plugin reduce my image file sizes by? =

Before writing this I uploaded a photo straight from a digital camera sized at 2,969kb once resized by this plugin that photo was reduced to 620k. The image was resized to 1000 x 1000px. You can alter these dimensions in your media setting.

= Does this plugin work on all browsers? =

 I don't think so. This looks like part of the reason this function is left out of WordPress core. Might be a good idea for users to add any browser resizing issues to the support forum so we know where the issues are. It works on Chrome and Firefox, that I do know!


== Changelog ==

= 0.3 =
* Made this plugin resize images automatically once enabled rather than having to tick a box. The option (tick box) is still visible on the media uploader should you wish to temporarily disable this plugins functionality.
* Max upload message is now hidden when this plugin is enabled as it's not as much of an issue. The upload limit is still physically there, it's set by your web host. Your resized images just stand a much greater chance of being below this limit.

= 0.2 =
* Readme changes.

= 0.1 =
* Initial release.
