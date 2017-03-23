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

        <?php while(osc_has_premiums()) { ?>
		<?php  $index = 0;
				         
                ?>
            <div class="estate" style="background:#F6EBCB">
                <div class="left">
                    <a href="<?php echo osc_premium_url() ; ?>"><?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if( osc_count_premium_resources() ) { ?>
                            <img src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_premium_title(); ?>" alt="<?php echo osc_premium_title(); ?>"/>
                        <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/big/') . osc_item_category_id() .'.png' ?>" width="196" height="110" alt="" title="" />
                        <?php } ?>
                   
                    <?php } ?>
                    <?php if( osc_price_enabled_at_items() ) { ?><div class="price" style="background:#ff0000"><?php echo osc_premium_formated_price() ; ?></div> <?php } ?>
                    </a>
                </div>
                <div class="right">
                    <div class="title">
                        <h3><a href="<?php echo osc_premium_url() ; ?>"><?php if(strlen(osc_premium_title()) > 101){ echo mb_substr(osc_premium_title(), 0, 100,'UTF-8').'...'; } else { echo osc_premium_title(); } ?></a></h3> </div>
						<div class="list_des">
						<?php if(strlen(osc_premium_description()) > 351){ echo strip_tags( mb_substr(osc_premium_description(), 0, 350,'UTF-8').'...'); } else { echo strip_tags (osc_premium_description()); } ?>
						</div>
					<div class="more" style="display:inline;">
					<div class="city" style="float:left;">&nbsp;&nbsp;<i class="fa fa-map-marker-v fa-lm2"></i>&nbsp;<?php echo osc_premium_city();?></div>
                    <div class="data" style="float:right;"><i class="fa fa-clock-o-v fa-lm2"></i>&nbsp;<?php echo osc_format_date(osc_premium_pub_date()); ?></div>
                        </div>
                </div>
            </div>
        <?php
                            $index++;
                            if($index == 10){
                                break; 
                            }
                        }
                    ?>  
<?php } ?>
   
		
		<?php $i = 0; ?>
		<?php while(osc_has_items()) { $i++; ?>
				
            <div class="estate">
                <div class="left" >
                    <a href="<?php echo osc_item_url() ; ?>"><?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if( osc_count_item_resources() ) { ?>
                            <img src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>"/>
                        <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/big/') . osc_item_category_id() .'.png' ?>" width="196" height="110" alt="" title="" />
                        <?php } ?>
              
                    <?php } ?>
                    <?php if( osc_price_enabled_at_items() ) { ?><div class="price"><?php echo osc_item_formated_price() ; ?></div> <?php } ?>
                    </a>
                </div>
                <div class="right">
                    <div class="title">
                        <h3><a href="<?php echo osc_item_url() ; ?>"><?php if(strlen(osc_item_title()) > 101){ echo mb_substr(osc_item_title(), 0, 100,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a></h3> </div>
						<div class="list_des">
						<?php if(strlen(osc_item_description()) > 351){ echo strip_tags( mb_substr(osc_item_description(), 0, 350,'UTF-8').'...'); } else { echo strip_tags (osc_item_description()); } ?>
						</div>
					<div class="more" style="display:inline;">
					
                    <div class="city" style="float:left;">&nbsp;&nbsp;<i class="fa fa-map-marker fa-lm2"></i>&nbsp;<?php echo osc_item_city();?></div>
                    <div class="data" style="float:right;"><i class="fa fa-clock-o fa-lm2"></i>&nbsp;<?php echo osc_format_date(osc_item_pub_date()); ?></div>
                        
 
					</div>
                </div>
            </div>
			<?php if( $i == osc_get_preference('search-middle', 'next_revo') ) { ?>
			<?php osc_run_hook('search_middle'); ?>
<?php } ?>
        <?php } ?>
		<br>
		