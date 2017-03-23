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



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $("a[rel=image_group]").fancybox({
                    openEffect : 'none',
                    closeEffect : 'none',
                    nextEffect : 'fade',
                    prevEffect : 'fade',
                    loop : false,
                    helpers : {
                            title : {
                                    type : 'inside'
                            }
                    }
                });
            });
        </script>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content item">
            <div id="item_head">
                <div class="inner">
                    <h1><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><span class="price"><i class="fa fa-tags"></i>&nbsp;<?php echo osc_item_formated_price(); ?></span> <?php } ?><strong><?php echo osc_item_title() . ' ' . osc_item_city(); ?></strong></h1>
                    <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                        <p id="edit_item_view">
                            <strong>
                                <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'next_revo'); ?></a>
                            </strong>
                        </p>
                    <?php } else { ?>

    <!--   <div id="item_report">
<form action="<?php echo osc_base_url(true); ?>" method="post" name="mask_as_form" id="mask_as_form">
            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
            <input type="hidden" name="as" value="spam" />
            <input type="hidden" name="action" value="mark" />
            <input type="hidden" name="page" value="item" />
            <select name="as" id="as" class="mark_as">
                  <option> <?php _e("Mark as...", 'next_revo'); ?></option>
                    <option value="spam"><?php _e("Mark as spam", 'next_revo'); ?></option>
                    <option value="badcat"><?php _e("Mark as misclassified", 'next_revo'); ?></option>
                    <option value="repeated"><?php _e("Mark as duplicated", 'next_revo'); ?></option>
                    <option value="expired"><?php _e("Mark as expired", 'next_revo'); ?></option>
                    <option value="offensive"><?php _e("Mark as offensive", 'next_revo'); ?></option>
            </select>
        </form>
  </div>-->
                    <?php }; ?>
                </div>
            </div>
            <div id="main">
			<?php if( osc_images_enabled_at_items() ) { ?>
			    <div class="clear"></div>
                <div id="type_dates">
                    <strong><i class="fa fa-folder-open"></i>
&nbsp;<?php echo osc_item_category(); ?></strong>
            </div>
			<?php if (osc_item_id()== 5){ ?>
			<div>
			<script type="text/javascript" src="http://servers10.com/mediacp/system/misc/jwplayer7/jwplayer.js?2.1.9.2"></script>
			<script type="text/javascript">jwplayer.key="qhEmdA8eZG/o4AbAAmWiTRjsZjI9L7NujXShRw==";</script><div id="myResponsiveVideo">Loading...</div>
			<script type="text/javascript">
			  jwplayer('myResponsiveVideo').setup({
			 sources: [{
			   file: "rtmp://servers10.com:1935/8342/8342"
			  },{
			   file: "http://servers10.com:1935/8342/8342/playlist.m3u8"
			  }],
			 rtmp: {
			  bufferlength: 3,
			 },
			'autostart': 'true',
			 'width': '100%',
			 fallback: false,
			 androidhls: true
			 });
			</script>               
			</div>
						
			<?php } /*if (osc_item_canal()!='No hay descripción disponible en tu idioma') { ?>
							<h2 style="margin-top: 10px;"><?php echo "Canal: " ; ?></h2>
							<iframe type="text/html" scrolling="no" marginwidth="0" marginheight="0"  width="650" height="400" src="<?php echo osc_item_canal(); ?>" frameborder="0" allowfullscreen></iframe>
			<?php } */?>
                    <?php if( osc_count_item_resources() > 0 ) { ?>
                    <div id="photos">
                        <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                        <a <?php if( $i <> 0 ) { echo ' id="img-link" '; } ?>href="<?php echo osc_resource_url(); ?>" rel="image_group" title="<?php _e('Image', 'next_revo'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
						
                            <?php if( $i == 0 ) { ?>
                            <img id="big" src="<?php echo osc_resource_url(); ?>" width="100%" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                            <?php } else { ?>
                                <img id="small" src="<?php echo osc_resource_thumbnail_url(); ?>" width="75" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                            <?php } ?>
							
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                <?php } ?>
                
                <div id="description">
                    <p><?php echo osc_item_description(); ?></p>					
                    <div id="custom_fields">
                        <?php if( osc_count_item_meta() >= 1 ) { ?>
                            <br />
                            <div class="meta_list">
                                <?php while ( osc_has_item_meta() ) { ?>
                                    <?php if(osc_item_meta_value()!='') { ?>
                                        <div class="meta">
                                            <strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
					
					</br>
					
					<ul id="item_location">
				    <?php if ( osc_item_pub_date() != "" ) { ?><li class="data"><i class="fa fa-clock-o fa-lg fa-fw"></i>&nbsp;<?php _e("Published date", 'next_revo') ; ?>: <strong><?php echo osc_format_date( osc_item_pub_date() );?></strong></li><?php } ?>
                    
                   
                    </ul>
					<ul id="item_location">
					<?php if ( osc_item_region() != "" ) { ?><li class="region"><i class="fa fa-map-marker fa-lg fa-fw"></i>&nbsp;<?php _e("Region", 'next_revo'); ?>: <strong><?php echo osc_item_region(); ?></strong></li><?php } ?>
                    <?php if ( osc_item_city() != "" ) { ?><li><i class="fa fa-map-marker fa-lg fa-fw"></i>&nbsp;<?php _e("City", 'next_revo'); ?>: <strong><?php echo osc_item_city(); ?></strong></li><?php } ?>
                    <?php //if ( osc_item_address() != "" ) { ?><!--<li><i class="fa fa-map-marker fa-lg fa-fw"></i>&nbsp;<?php _e("Address", 'next_revo'); ?>: <strong><?php echo osc_item_address(); ?></strong></li>--><?php //} ?>
					</ul>
					<!--<ul id="item_location">
					 <?php if ( osc_item_city_area() != "" ) { ?><li class="telefon"><i class="fa fa-phone fa-lg fa-fw"></i>&nbsp;<?php _e("City area", 'next_revo'); ?>: <strong><?php echo osc_item_city_area(); ?></strong></li><?php } ?></ul>
					 <ul id="item_location">
					<li class="data"><i class="fa fa-eye fa-lg fa-fw"></i>&nbsp;<?php _e("Views", 'next_revo') ; ?>: <strong><?php echo osc_item_views(); ?></strong></li>
					</ul>-->
                    <div class="clear"></div>
					<?php if( osc_get_preference('item-nextrevo_desc', 'next_revo') != '') {?>
                <div class="next_item_desc">
                    <?php echo osc_get_preference('item-nextrevo_desc', 'next_revo'); ?>
                </div>
                <?php } ?>
					<br />
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-535d5a6132ffb0f3" async="async"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<br />
                    <?php osc_run_hook('item_detail', osc_item() ); ?>
                    <br />
                    <?php osc_run_hook('location'); ?>
                </div>
				<?php osc_run_hook('video_embed_show');?>
                <!-- plugins -->
                <!--<div id="useful_info">
                    <h2><i class="fa fa-exclamation-triangle"></i>&nbsp;<?php _e('Useful information', 'next_revo'); ?></h2>
                    <ul>
                        <li><?php _e('Avoid scams by acting locally or paying with PayPal', 'next_revo'); ?></li>
                        <li><?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'next_revo'); ?></li>
                        <li><?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'next_revo'); ?></li>
                        <li><?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'next_revo'); ?></li>
                    </ul>
                </div>-->
                <?php if( osc_comments_enabled() ) { ?>
                    <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
                    <div id="comments">
                        <h2><?php _e('Comments', 'next_revo'); ?></h2>
                        <ul id="comment_error_list"></ul>
                        <?php CommentForm::js_validation(); ?>
                        <?php if( osc_count_item_comments() >= 1 ) { ?>
                            <div class="comments_list">
                                <?php while ( osc_has_item_comments() ) { ?>
                                    <div class="comment">
                                        <h3><strong><?php echo osc_comment_title(); ?></strong> <em><?php _e("by", 'next_revo'); ?> <?php echo osc_comment_author_name(); ?>:</em></h3>
                                        <p><?php echo nl2br( osc_comment_body() ); ?> </p>
                                        <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                                        <p>
                                            <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'next_revo'); ?>"><?php _e('Delete', 'next_revo'); ?></a>
                                        </p>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div class="paginate" style="text-align: right;">
                                    <?php echo osc_comments_pagination(); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                            <fieldset>
                                <h3><?php _e('Leave your comment (spam and offensive messages will be removed)', 'next_revo'); ?></h3>
                                <input type="hidden" name="action" value="add_comment" />
                                <input type="hidden" name="page" value="item" />
                                <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                <?php if(osc_is_web_user_logged_in()) { ?>
                                    <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                    <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                                <?php } else { ?>
                                    <label for="authorName"><?php _e('Your name', 'next_revo'); ?>:</label> <?php CommentForm::author_input_text(); ?><br />
                                    <label for="authorEmail"><?php _e('Your e-mail', 'next_revo'); ?>:</label> <?php CommentForm::email_input_text(); ?><br />
                                <?php }; ?>
                                <label for="title"><?php _e('Title', 'next_revo'); ?>:</label><?php CommentForm::title_input_text(); ?><br />
                                <label for="body"><?php _e('Comment', 'next_revo'); ?>:</label><?php CommentForm::body_input_textarea(); ?><br />
                                <div class="clear"></div>
								<button type="submit" class="ui-button"><?php _e('Send', 'next_revo'); ?></button>
                            </fieldset>
                        </form>
                    </div>
                    <?php } ?>
                <?php } ?>
				
            </div>
			
            <!--<div id="sidebar">
                
				<?php if( osc_get_preference('item-nextrevo_image', 'next_revo') != '') {?>
                <div class="next_item_desc">
                    <?php echo osc_get_preference('item-nextrevo_image', 'next_revo'); ?>
                </div>
                <?php } ?>
                <div id="contact">
                    <h2><i class="fa fa-envelope"></i>&nbsp;<?php _e("Contact publisher", 'next_revo'); ?></h2>
                    <?php if( osc_item_is_expired () ) { ?>
                        <p>
                            <?php _e("The listing is expired. You can't contact the publisher.", 'next_revo'); ?>
                        </p>
                    <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
                        <p>
                            <?php _e("It's your own listing, you can't contact the publisher.", 'next_revo'); ?>
                        </p>
                    <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                        <p>
                            <?php _e("You must log in or register a new account in order to contact the advertiser", 'next_revo'); ?>
                        </p>
                        <p class="contact_button">
                            <strong><a href="<?php echo osc_user_login_url(); ?>"><i class="fa fa-sign-in"></i>&nbsp;<?php _e('Login', 'next_revo'); ?></a></strong>
                            <strong><a href="<?php echo osc_register_account_url(); ?>"><i class="fa fa-pencil-square-o"></i>&nbsp;<?php _e('Register for a free account', 'next_revo'); ?></a></strong>
                        </p>
                    <?php } else { ?>
                        <?php if( osc_item_user_id() != null ) { ?>
                            <p class="name"><?php _e('Name', 'next_revo') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></p>
                        <?php } else { ?>
                            <p class="name"><?php _e('Name', 'next_revo') ?>: <?php echo osc_item_contact_name(); ?></p>
                        <?php } ?>
                        <?php if( osc_item_show_email() ) { ?>
                            <p class="email"><?php _e('E-mail', 'next_revo'); ?>: <?php echo osc_item_contact_email(); ?></p>
                        <?php } ?>
                        <?php if ( osc_user_phone() != '' ) { ?>
                            <p class="phone"><?php _e("Tel", 'next_revo'); ?>.: <?php echo osc_user_phone(); ?></p>
                        <?php } ?>
                        <ul id="error_list"></ul>
                        <?php ContactForm::js_validation(); ?>
                        <form <?php if( osc_item_attachment() ) { ?>enctype="multipart/form-data"<?php } ?> action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                            <?php osc_prepare_user_info(); ?>
                            <fieldset>
                                <label for="yourName"><?php _e('Your name', 'next_revo'); ?>:</label> <?php ContactForm::your_name(); ?>
                                <label for="yourEmail"><?php _e('Your e-mail address', 'next_revo'); ?>:</label> <?php ContactForm::your_email(); ?>
                                <label for="phoneNumber"><?php _e('Phone number', 'next_revo'); ?> (<?php _e('optional', 'next_revo'); ?>):</label> <?php ContactForm::your_phone_number(); ?>
                                <?php if( osc_item_attachment() ) { ?>
                                <label for="contact-attachment"><?php _e('Attachments', 'twitter') ; ?></label><?php ContactForm::your_attachment() ; ?>
                                <?php } ?>
                                <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                                <label for="message"><?php _e('Message', 'next_revo'); ?>:</label> <?php ContactForm::your_message(); ?>
                                <input type="hidden" name="action" value="contact_post" />
                                <input type="hidden" name="page" value="item" />
                                <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
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
                    <?php } ?>
                </div>
				<?php if (function_exists('related_next_start')) {related_next_start();} ?> 
            </div>-->
			<div class="clear"></div>
			
        </div>
		</div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
