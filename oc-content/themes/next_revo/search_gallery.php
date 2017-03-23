<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

  osc_get_premiums(10);
    if(osc_count_premiums() > 0) {
?>
        <?php $class = "even"; ?>
        <?php while(osc_has_premiums()) { ?>
		<?php  $index = 0;
				         
                ?>
            <div class="next_item" >
	<div class="item_box" ><div class="item" ><div class="next_revo" ><div class="next_revo2" style="background:#F6EBCB">
	<div class="title"><h2><a href="<?php echo osc_premium_url(); ?>"><?php if(strlen(osc_premium_title()) > 51){ echo mb_substr(osc_premium_title(), 0, 50,'UTF-8').'...'; } else { echo osc_premium_title(); } ?></a></h2></div>
	<div class="next_revo_detail">
	<div class="item_img_premium"><?php if( osc_count_premium_resources() ) { ?><a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="196" height="110" alt="<?php echo osc_premium_title(); ?>"/></a><?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/big/') . osc_item_category_id() .'.png' ?>" width="196" height="110" alt="" title="" />
                                            <?php } ?></div>
											<div class="region">&nbsp;<i class="fa fa-map-marker-v fa-lm"></i>&nbsp;&nbsp;&nbsp;<?php echo osc_premium_city();?></div>
											<!--<div class="price">&nbsp;<i class="fa fa-tag-v fa-lm"></i>&nbsp;&nbsp;<?php echo osc_premium_formated_price(); ?></div>-->
											<div class="revo_bottom"></div><div class="see_details_box_p"><a class="see_details" href="<?php echo osc_premium_url(); ?>" ><?php _e('More', 'next_revo') ; ?></a></div></div></div></div></div></div></div>
            <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
			 <?php
                            $index++;
                            if($index == 10){
                                break; 
                            }
                        }
                    ?>  

<?php } ?>

        <?php $class = "even"; ?>
        <?php while(osc_has_items()) { ?>
           <div class="next_item">
	<div class="item_box" ><div class="item"><div class="next_revo"><div class="next_revo2">
	<div class="title"><h2><a href="<?php echo osc_item_url(); ?>"><?php if(strlen(osc_item_title()) > 51){ echo mb_substr(osc_item_title(), 0, 50,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a></h2></div>
	<div class="next_revo_detail">
	<div class="item_img"><?php if( osc_count_item_resources() ) { ?><a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="196" height="110" alt="<?php echo osc_item_title(); ?>"/></a><?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/big/') . osc_item_category_id() .'.png' ?>" width="196" height="110" alt="" title="" />
                                            <?php } ?></div>
											<div class="region">&nbsp;<i class="fa fa-map-marker fa-lm"></i>&nbsp;&nbsp;&nbsp;<?php echo osc_item_city();?></div>
											<!--<div class="price">&nbsp;<i class="fa fa-tag fa-lm"></i>&nbsp;&nbsp;<?php echo osc_item_formated_price(); ?></div>-->
											<div class="revo_bottom"></div><div class="see_details_box"><a class="see_details" href="<?php echo osc_item_url(); ?>" ><?php _e('More', 'next_revo') ; ?></a></div></div></div></div></div></div></div>
            <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
        <?php } ?>

