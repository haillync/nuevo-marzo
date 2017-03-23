<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
 
    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);

    osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content item user_public_profile">
            <div id="item_head">
                <div class="inner">
                    <h1><i class="fa fa-user"></i>
 <?php echo sprintf(__('%s\'s profile', 'next_revo'), osc_user_name()); ?></h1>
                </div>
            </div>
            <div id="main">
                <br />
                <div id="description">
                <h2><?php _e('Profile', 'next_revo'); ?></h2>
                    <ul id="user_data">
                        <li><?php _e('Full name', 'next_revo'); ?>: <?php echo osc_user_name(); ?></li>
                        <li><?php _e('Address', 'next_revo'); ?>: <?php echo $address; ?></li>
                        <li><?php _e('Location', 'next_revo'); ?>: <?php echo $location; ?></li>
                        <li><?php _e('Website', 'next_revo'); ?>: <?php echo osc_user_website(); ?></li>
                        <li><?php _e('User Description', 'next_revo'); ?>: <?php echo osc_user_info(); ?></li>
                    </ul>
                </div>
                <div id="description" class="latest_ads">
                    <h2><?php _e('Latest listings', 'next_revo'); ?></h2>
                    <table border="0" cellspacing="0">
                        <tbody>
                            <?php $class = "even"; ?>
			<?php while ( osc_has_items() ) { ?>
			 
			<div class="estate1">
                <div class="left1">
                    <a href="<?php echo osc_item_url() ; ?>"><?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if( osc_count_item_resources() ) { ?>
                            <img src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>"/>
                        <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                        <?php } ?>
                    <?php } else { ?>
                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                    <?php } ?>
                    <?php if( osc_price_enabled_at_items() ) { ?><div class="price"><?php echo osc_item_formated_price() ; ?></div> <?php } ?>
                    </a>
                </div>
                <div class="right1">
                    <div class="title">
                        <h3><a href="<?php echo osc_item_url() ; ?>"><?php if(strlen(osc_item_title()) > 61){ echo mb_substr(osc_item_title(), 0, 60,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a></h3> </div>
						<div class="list_des">
						<?php if(strlen(osc_item_description()) > 251){ echo mb_substr(osc_item_description(), 0, 250,'UTF-8').'...'; } else { echo osc_item_description(); } ?>
						</div>
						<div class="more" style="display:inline;">
					
                    <div class="city" style="float:left;display:inline;">&nbsp;&nbsp;<i class="fa fa-map-marker fa-lm2"></i>&nbsp;<?php echo osc_item_region();?></div>
                    <div class="data" style="float:right;"><i class="fa fa-clock-o fa-lm2"></i>&nbsp;<?php echo osc_format_date(osc_item_pub_date()); ?></div>
                        
 
					</div>
                </div>
            </div>       
			<?php $class = ($class == 'even') ? 'odd' : 'even' ; ?>
			<?php } ?>
                        </tbody>
                    </table>
                    <?php if(osc_search_total_pages() > osc_max_results_per_page_at_search() ) { ?>
                    <p class="see_more_link"><a href="<?php echo osc_base_url(true).'&page=search&sUser[]='.osc_user_id(); ?>"><strong>See all offers »</strong></a></p>
                    <?php } ?>
                </div>
            </div>
            <div id="sidebar">
                <?php if(osc_logged_user_id()!=  osc_user_id()) { ?>
                <?php     if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                <div id="contact">
                    <h2><i class="fa fa-envelope"></i>&nbsp;<?php _e("Contact publisher", 'next_revo'); ?></h2>
                    <ul id="error_list"></ul>
                    <?php ContactForm::js_validation(); ?>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                        <input type="hidden" name="action" value="contact_post" />
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
                        <?php osc_prepare_user_info(); ?>
                        <fieldset>
                            <label for="yourName"><?php _e('Your name', 'next_revo'); ?>:</label> <?php ContactForm::your_name(); ?>
                            <label for="yourEmail"><?php _e('Your e-mail address', 'next_revo'); ?>:</label> <?php ContactForm::your_email(); ?>
                            <label for="phoneNumber"><?php _e('Phone number', 'next_revo'); ?> (<?php _e('optional', 'next_revo'); ?>):</label> <?php ContactForm::your_phone_number(); ?>
                            <label for="message"><?php _e('Message', 'next_revo'); ?>:</label> <?php ContactForm::your_message(); ?>
                            <?php if( osc_recaptcha_public_key() ) { ?>
                            <script type="text/javascript">
                                var RecaptchaOptions = {
                                    theme : 'custom',
                                    custom_theme_widget: 'recaptcha_widget'
                                };
                            </script>
                            <style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:280px; } </style>
                            <div id="recaptcha_widget">
                                <div id="recaptcha_image"><img /></div>
                                <span class="recaptcha_only_if_image"><?php _e('Enter the words above','next_revo'); ?>:</span>
                                <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'next_revo'); ?></a></div>
                            </div>
                            <?php } ?>
                            <?php osc_show_recaptcha(); ?>
                            <button type="submit" class="ui-button"><?php _e('Send', 'next_revo'); ?></button>
                        </fieldset>
                    </form>
                </div>
                <?php     } ?>
                <?php } ?>
            </div>
        </div></div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
