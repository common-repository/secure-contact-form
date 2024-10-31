<?php
/*
Author: Andrei Cipu
Author URI: http://www.strainu.ro
Description: Administrative options for SecureContact
*/

load_plugin_textdomain('wpcf',$path = 'wp-content/plugins/secure-contact');
$location = get_option('siteurl') . '/wp-admin/admin.php?page=secure-contact/options-contactform.php'; // Form Action URI

$admin_e = get_option('admin_email');
$blog_n  = get_option('blogname');

/*Lets add some default options if they don't exist*/
add_option('wpcf_email', $admin_e);
add_option('wpcf_subject_suffix', " -- $blog_n contact form");
add_option('wpcf_success_msg', 'Thanks for your comments!');
add_option('wpcf_error_msg', 'Please complete the required fields.');
add_option('wpcf_error_img', 'Please complete the image verification correctly.');
add_option('wpcf_mal_msg', "Possible malicious code detected.  No HTML, URIs, or anchor tags are allowed in message.");
add_option('wpcf_show_quicktag', TRUE);
add_option('wpcf_apply_css', TRUE);
add_option('wpcf_anchor', TRUE);
add_option('wpcf_textarea_cols', '30');
add_option('wpcf_textarea_rows', '8');
add_option('wpcf_CC_permitted', FALSE);
add_option('wpcf_allow_URIs', FALSE);
/*check form submission and update options*/
if ('process' == $_POST['stage'])
{
update_option('wpcf_email', $_POST['wpcf_email']);
update_option('wpcf_subject_suffix', $_POST['wpcf_subject_suffix']);
update_option('wpcf_success_msg', $_POST['wpcf_success_msg']);
update_option('wpcf_error_msg', $_POST['wpcf_error_msg']);
update_option('wpcf_error_img', $_POST['wpcf_error_img']);
update_option('wpcf_mal_msg', $_POST['wpcf_mal_msg']);
update_option('wpcf_textarea_cols', $_POST['wpcf_textarea_cols']);
update_option('wpcf_textarea_rows', $_POST['wpcf_textarea_rows']);
if (isset($_POST['wpcf_apply_css'])) // If wpcf_apply_css is checked
    {update_option('wpcf_apply_css', TRUE);}
    else {update_option('wpcf_apply_css', FALSE);}
if (isset($_POST['wpcf_show_quicktag'])) // If wpcf_show_quicktag is checked
	{update_option('wpcf_show_quicktag', TRUE);}
	else {update_option('wpcf_show_quicktag', FALSE);}
if (isset($_POST['wpcf_CC_permitted'])) // if CC function is enabled
    {update_option('wpcf_CC_permitted', TRUE);}
    else {update_option('wpcf_CC_permitted', FALSE);}
if (isset($_POST['wpcf_anchor'])) // if anchor function is enabled
    {update_option('wpcf_anchor', TRUE);}
    else {update_option('wpcf_anchor', FALSE);}
if (isset($_POST['wpcf_allow_URIs'])) // if anchor function is enabled
    {update_option('wpcf_allow_URIs', TRUE);}
    else {update_option('wpcf_allow_URIs', FALSE);}
}
/*Get options for form fields*/
$wpcf_email = stripslashes(get_option('wpcf_email'));
$wpcf_subject_suffix = stripslashes(get_option('wpcf_subject_suffix'));
$wpcf_success_msg = stripslashes(get_option('wpcf_success_msg'));
$wpcf_error_msg = stripslashes(get_option('wpcf_error_msg'));
$wpcf_error_img = stripslashes(get_option('wpcf_error_img'));
$wpcf_mal_msg = stripslashes(get_option('wpcf_mal_msg'));
$wpcf_textarea_cols = stripslashes(get_option('wpcf_textarea_cols'));
$wpcf_textarea_rows = stripslashes(get_option('wpcf_textarea_rows'));
$wpcf_textarea_cols = preg_replace('/([A-Za-z]*)/','',$wpcf_textarea_cols);
$wpcf_textarea_rows = preg_replace('/([A-Za-z]*)/','',$wpcf_textarea_rows);
$wpcf_show_quicktag = get_option('wpcf_show_quicktag');
$wpcf_apply_css = get_option('wpcf_apply_css');
$wpcf_anchor = get_option('wpcf_anchor');
$wpcf_allow_URIs = get_option('wpcf_allow_URIs');
$wpcf_CC_permitted = get_option('wpcf_CC_permitted');
?>

<div class="wrap">
  <h2><?php _e('Secure Contact Options', 'wpcf') ?></h2>
 <form name="form1" method="post" action="<?php echo $location ?>&amp;updated=true">
	<input type="hidden" name="stage" value="process" />
    <table width="100%" cellspacing="2" cellpadding="5" class="editform">
      <tr valign="top">
        <th scope="row"><?php _e('E-mail Address:') ?></th>
        <td><input name="wpcf_email" type="text" id="wpcf_email" value="<?php echo $wpcf_email; ?>" size="40" />
        <br />
<?php _e('Enter the email address where the form should send email to.', 'wpcf') ?></td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e('Subject Suffix:') ?></th>
        <td><input name="wpcf_subject_suffix" type="text" id="wpcf_subject_suffix" value="<?php echo $wpcf_subject_suffix; ?>" size="80" />
        <br />
<?php _e('This will append arbitrary text to the subject line, allowing you to easily identify that the contact originated via the contact form.<br />Leave this field blank if you would like to omit a subject suffix.', 'wpcf') ?></td>
      </tr>
     </table>

	<fieldset class="options">
		<legend><?php _e('Messages', 'wpcf') ?></legend>
		<table width="100%" cellspacing="2" cellpadding="5" class="editform">
		  <tr valign="top">
			<th scope="row"><?php _e('Success Message:', 'wpcf') ?></th>
			<td><textarea name="wpcf_success_msg" id="wpcf_success_msg" style="width: 80%;" rows="4" cols="50"><?php echo $wpcf_success_msg; ?></textarea>
			<br />
	<?php _e('Upon successful form submission, this is the message the user will see.<br />HTML allowed.', 'wpcf') ?></td>
		  </tr>
		  <tr valign="top">
			<th scope="row"><?php _e('Error Message:', 'wpcf') ?></th>
			<td><textarea name="wpcf_error_msg" id="wpcf_error_msg" style="width: 80%;" rows="4" cols="50"><?php echo $wpcf_error_msg; ?></textarea>
			<br />
	<?php _e('If the user skips a required field (or enters an invalid email address), this message will be displayed.<br />HTML allowed.', 'wpcf') ?> <br /><br />
	<?php _e('<small>Note: You can apply CSS to this text by wrapping it in <code>&lt;p style="[your CSS here]"&gt;[error message]&lt;/p&gt;</code>.', 'wpcf') ?><br />
	<?php _e('Example: <code>&lt;p style="color:red;"&gt;Please fill in the required fields.&lt;/p&gt;</code>.</small>', 'wpcf') ?></td>
		  </tr>
		<tr valign="top">
			<th scope="row"><?php _e('Image Code Error Message:', 'wpcf') ?></th>
			<td><textarea name="wpcf_error_img" id="wpcf_error_img" style="width: 80%;" rows="4" cols="50"><?php echo $wpcf_error_img; ?></textarea>
			<br />
	<?php _e('If the user imputs the wrong security code, this message will be displayed.<br />HTML allowed.', 'wpcf') ?> <br /><br />
	<?php _e('<small>Note: You can apply CSS to this text by wrapping it in <code>&lt;p style="[your CSS here]"&gt;[error message]&lt;/p&gt;</code>.', 'wpcf') ?><br />
	<?php _e('Example: <code>&lt;p style="color:red;"&gt;Please fill in the security code.&lt;/p&gt;</code>.</small>', 'wpcf') ?></td>
		  </tr>
          <tr valign="top">
            <th scope="row"><?php _e('Malicious Warning:', 'wpcf') ?></th>
            <td><textarea name="wpcf_mal_msg" id="wpcf_mal_msg" style="width: 80%;" rows="4" cols="50"><?php echo $wpcf_mal_msg;?></textarea>
            <br />
    <?php _e('If malicious code or spam phrases are entered, this message will be displayed.<br />HTML allowed.','wpcf') ?> <br /><br />
    <?php _e('<small>Note: You can apply CSS to this text by wrapping it in <code>&lt;p style="[your CSS here]"&gt;[warning message]&lt;/p&gt;</code>.', 'wpcf') ?><br />
    <?php _e('Example: <code>&lt;p style="color:red;"&gt;No spammy stuff allowed!&lt;/p&gt;</code>.</small>', 'wpcf') ?></td>
          </tr>
		</table>

	</fieldset>

	<fieldset class="options">
		<legend><?php _e('Advanced', 'wpcf') ?></legend>

	    <table width="100%" cellpadding="5" class="editform">
        <tr valign="top">
            <th width="30%" scope="row" style="text-align: left"><?php _e('Spam control: Message field URI toggle', 'wpcf') ?></th>
            <td>
                <input name="wpcf_allow_URIs" type="checkbox" id="wpcf_allow_URIs" value="wpcf_allow_URIs" <?php if($wpcf_allow_URIs == TRUE) {?> checked="checked" <?php } ?> /><br />
                <?php _e('Enabling this setting will allow visitors to enter URIs in the message field (e.g. http://example.com) <strong>IMPORTANT: Enabling this option will allow link spam to be submitted!</strong>', 'wpcf') ?>
            </td>
        </tr>
        <tr valign="top">
            <th width="30%" scope="row" style="text-align: left"><?php _e('Carbon-Copy ability', 'wpcf') ?></th>
            <td>
                <input name="wpcf_CC_permitted" type="checkbox" id="wpcf_CC_permitted" value="wpcf_CC_permitted" <?php if($wpcf_CC_permitted == TRUE) {?> checked="checked" <?php } ?> /><br />
                <?php _e('Enabling this setting will allow visitors to Carbon-Copy their message to their email address.', 'wpcf') ?>
            </td>
        </tr>
        <tr valign="top">
            <th width="30%" scope="row" style="text-align: left"><?php _e('Contact form message box width:', 'wpcf') ?></th>
            <td>
                <input name="wpcf_textarea_cols" type="text" id="wpcf_textarea_cols" value="<?php echo $wpcf_textarea_cols; ?>" size="3" maxlength="2" />
<br />
<?php _e('This setting allows you to adjust the width (columns) of the contact form message box.', 'wpcf') ?>
            </td>
          </tr>
        <tr valign="top">
            <th width="30%" scope="row" style="text-align: left"><?php _e('Contact form message box height:', 'wpcf') ?></th>
            <td>
                <input name="wpcf_textarea_rows" type="text" id="wpcf_textarea_rows" value="<?php echo $wpcf_textarea_rows; ?>" size="3" maxlength="2" />
<br />
<?php _e('This setting allows you to adjust the height (rows) of the contact form message box.', 'wpcf') ?>
            </td>
          </tr>
          <tr valign="top">
            <th width="30%" scope="row" style="text-align: left"><?php _e('Apply Contact Form CSS', 'wpcf') ?></th>
            <td>
                <input name="wpcf_apply_css" type="checkbox" id="wpcf_apply_css" value="wpcf_apply_css" <?php if($wpcf_apply_css == TRUE) {?> checked="checked" <?php } ?> /><br />
<?php _e('This setting will apply a pre-set CSS style to the Contact Form.  Disable this option if you do not want the contact form styled with CSS.  Also note, disabling this option will allow you to create your own custom contact form CSS classes/styles.', 'wpcf') ?>
            </td>
          </tr>
          <tr valign="top">
            <th width="30%" scope="row" style="text-align: left"><?php _e('Apply Contact Form Anchor', 'wpcf') ?></th>
            <td>
                <input name="wpcf_anchor" type="checkbox" id="wpcf_anchor" value="wpcf_anchor" <?php if($wpcf_anchor == TRUE) {?> checked="checked" <?php } ?> /><br />
<?php _e('This setting will apply a pre-set Anchor to the Contact Form.  When enabled, form submisisons will be brought directly back to the exact start of the form, so that result messages can be easily seen by the user.  This is handy for contact forms that appear in the lower portion of content/webpages.', 'wpcf') ?>
            </td>
          </tr>
	      <tr valign="top">
	        <th width="30%" scope="row" style="text-align: left"><?php _e('Show \'Contact Form\' Quicktag', 'wpcf') ?></th>
	        <td>
	        	<input name="wpcf_show_quicktag" type="checkbox" id="wpcf_show_quicktag" value="wpcf_show_quicktag"
	        	<?php if($wpcf_show_quicktag == TRUE) {?> checked="checked" <?php } ?> /><br /><?php _e('This setting will enable the \'Contact Form\' Quicktag in the post/page editor', 'wpcf') ?>
			</td>
	      </tr>
	     </table>

	</fieldset>

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpcf') ?> &raquo;" />
    </p>
  </form>
</div>
