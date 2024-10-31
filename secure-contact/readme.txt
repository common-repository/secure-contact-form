=== Secure Contact ===
Contributors: Andrei Cipu
Donate link: http://www.strainu.ro/
Tags: contact, email, spam
Requires at least: 2.0.0
Tested up to: 2.3
Stable tag: 1.2

SecureContact is a drop in form for users to contact you. It can be implemented on a page or a post. It offers enhaced security by using captcha images. It currently works with WordPress 2.0+. It's based on the WP Contact Form plugin by Ryan Duff

== Description ==

SecureContact is a drop in form for users to contact you, based on the WP Contact Form plugin by Ryan Duff. It offers enhaced security by using captcha images. The code is only lowercase letters and numbers.

It can be implemented on a page or a post.  

It currently works with WordPress 2.0+. 

In order to use it, you need to have the PHP's GD extension activated. Contact your hosting company to see whether it is activated.

== Installation ==

1. Upload all files to wp-content/plugins/secure-contact/
2. Activate the plugin on the plugin screen
3. Go to Options -> Contact Form and update the fields with your information
4. Create a post or a page and press the Contact Form quicktag where you want the form to be. If you don't see the Contact Form quicktag, you can alternatively copy and paste <!--contact form--> where you want it to appear.

== Frequently Asked Questions ==

= How come I don't see the `Contact Form` quicktag? =

* You have the `Show quicktag` checkbox on Options -> Contact Form turned off
* You're not using the default set of quicktags for the editor
* Its a Glitch

Solution: Copy and paste `<!--contact form-->` minus the backticks where you want the form to appear.

= What license is the plugin using? =
Secure Contact is distributed under the GPL v2. See <http://www.gnu.org/licenses/gpl.txt> for full license.

== Upgrade ==

1. If you are upgrading from an older version, delete your old options-contactform.php in wp-admin/ or wp-content/plugins/ and delete your wp-contactform.php in wp-content/plugins/
2. Upload all files to wp-content/plugins/secure-contact/
3. Your old options have been saved in the database and will appear when you visit options > contact form

== Bugs - Features - Support ==
Please report bugs via:
http://dev.wp-plugins.org/newticket?&component=secure-contact-form

If you want you can also contact me through my contact form after you submit the bug to notify me and so I can contact you via email if I have any questions.

You can also contact me through the form if you have any feature requests or suggestions.

If you need support, I will try and respond in a timely fashion, but currently I am trying to stick to bug requests and incorporating new features. You can contact me through the form for support.

== Version History ==
* v1.2.0 - increased the fonts in the security image. Now it only has lowercase leters and numbers 

* v1.1.1 - added the image error message option. Fixed some problems with wpautop

* v1.1.0 - changed the original plugin to Contact Form ][  by Chip Cuccio

* V1.0.0 - first version