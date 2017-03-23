<div class="related_ads">         
<h2><?php _e('Related Ads', 'next_revo'); ?></h2>
	    <?php if( osc_count_items() == 0) { ?>
		 <p><?php _e('No Related Ads', 'next_revo'); ?></p>
	    <?php } else { ?>

			<?php $class = "even"; ?>
			<?php while ( osc_has_items() ) { ?>
			 
		<div class="related_item">
	<div class="item_box" ><div class="item"><div class="next_revo"><div class="next_revo2">
	<div class="title"><h2><a href="<?php echo osc_item_url(); ?>"><?php if(strlen(osc_item_title()) > 51){ echo mb_substr(osc_item_title(), 0, 50,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a></h2></div>
	<div class="next_revo_detail">
	<div class="item_img"><?php if( osc_count_item_resources() ) { ?><a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="196" height="110" alt="<?php echo osc_item_title(); ?>"/></a><?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" width="196" height="110" alt="" title="" />
                                            <?php } ?></div>
											<div class="region">&nbsp;<i class="fa fa-map-marker fa-lm"></i>&nbsp;&nbsp;&nbsp;<?php echo osc_item_city();?></div>
											<div class="price">&nbsp;<i class="fa fa-tag fa-lm"></i>&nbsp;&nbsp;</span><?php echo osc_item_formated_price(); ?></div>
											<div class="revo_bottom"></div><div class="see_details_box"><a class="see_details" href="<?php echo osc_item_url(); ?>" ><?php _e('More', 'next') ; ?></a></div></div></div></div></div></div></div>
			<?php $class = ($class == 'even') ? 'odd' : 'even' ; ?>
			<?php } ?>

		<?php } ?>
		</div>		
 <br />
