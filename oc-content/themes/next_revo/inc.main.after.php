<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */


?>
<div class="popular_main">
<?php if( osc_get_preference('main-carousel-tip', 'next_revo') == 'popular') {?>
		
                    <?php next_popular_ads_start(); ?>
					<?php if( osc_count_custom_items() == 0) { ?>
                        <p class="empty"></p>
                    <?php } else { ?>
				<div class="title" style="text-align:center; font-size: 14px;"><h3><i class="fa fa-star"></i>




<?php echo "Avisos y Comunicados"; ?> <i class="fa fa-star"></i>



</h3></div>
<link href="<?php osc_base_url(); ?>oc-content/themes/next_revo/js/slick/slick.css" rel="stylesheet" type="text/css" />		
<div class="slider" style="background:none repeat scroll 0 0 #f6f6f6;">
				
                     <?php $class = "even"; ?>					 
        <?php while(osc_has_custom_items()) { ?>
		

        


	<div class="item_box" ><div class="item"><div class="next_revo"><div class="next_revo2">
	<div class="title"><h2><a href="<?php echo osc_item_url(); ?>"><?php if(strlen(osc_item_field('s_title') ) > 51){ echo mb_substr(osc_item_field('s_title') , 0, 50,'UTF-8').'...'; } else { echo osc_item_field('s_title') ; } ?></a></h2></div>
	<div class="next_revo_detail">
	<div class="item_img"><?php if( osc_count_item_resources() ) { ?><a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="196" height="110" alt="<?php echo osc_item_field('s_title') ; ?>"/></a><?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" width="196" height="110" alt="" title="" />
                                            <?php } ?></div>
											<div class="region">&nbsp;<i class="fa fa-map-marker fa-lm"></i>&nbsp;&nbsp;&nbsp;<?php echo osc_item_city();?></div>
											<div class="price">&nbsp;<i class="fa fa-tag fa-lm"></i>&nbsp;&nbsp;<?php echo osc_item_formated_price(); ?></div>
											<div class="revo_bottom"></div><div class="see_details_box"><a class="see_details" href="<?php echo osc_item_url(); ?>" >
<?php _e('More', 'next_revo') ; ?>



</a></div></div></div></div></div></div>
										
			
			 
			 
            <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
        <?php } ?>
		<?php View::newInstance()->_erase('items'); } ?>
  
					</div>

			 <script type="text/javascript" src="oc-content/themes/next_revo/js/slick/slick.js"></script>
      <script>
        $(document).ready(function(){
            $('.slider').slick({
              slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,
    responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
      }
    },
	 {
      breakpoint: 640,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      }
    }
	]
            });
        });
    </script>
	<?php } elseif(osc_get_preference('main-carousel-tip', 'next_revo') == 'premium'){?>
	                    <?php $num_ads2 = revo_main_carousel_num_ads() ; ?>
						<?php osc_get_premiums($num_ads2); ?>
					<?php if( osc_count_premiums() == 0) { ?>
				<br>
                <?php } else { ?>
				<div class="title" style="text-align:center; font-size: 14px;"><h3><i class="fa fa-star"></i>




<?php _e('Premium listings', 'next_revo'); ?> <i class="fa fa-star"></i>



</h3></div>
<link href="<?php osc_base_url(); ?>oc-content/themes/next_revo/js/slick/slick.css" rel="stylesheet" type="text/css" />		
<div class="slider" style="background:none repeat scroll 0 0 #f6f6f6;">			
                     <?php  $index = 0;				         
                ?>		
                    <?php while ( osc_has_premiums()) {
                        ?>
	<div class="item_box" ><div class="item"><div class="next_revo"><div class="next_revo2">
	<div class="title"><h2><a href="<?php echo osc_premium_url(); ?>"><?php if(strlen(osc_premium_title() ) > 51){ echo mb_substr(osc_premium_title() , 0, 50,'UTF-8').'...'; } else { echo osc_premium_title() ; } ?></a></h2></div>
	<div class="next_revo_detail">
	<div class="item_img"><?php if( osc_count_premium_resources() ) { ?><a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="196" height="110" alt="<?php echo osc_premium_title() ; ?>"/></a><?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" width="196" height="110" alt="" title="" />
                                            <?php } ?></div>
											<div class="region">&nbsp;<i class="fa fa-map-marker fa-lm"></i>&nbsp;&nbsp;&nbsp;<?php echo osc_premium_city();?></div>
											<div class="price">&nbsp;<i class="fa fa-tag fa-lm"></i>&nbsp;&nbsp;<?php echo osc_premium_formated_price(); ?></div>
											<div class="revo_bottom"></div><div class="see_details_box"><a class="see_details" href="<?php echo osc_premium_url(); ?>" >
<?php _e('More', 'next_revo') ; ?>



</a></div></div></div></div></div></div>
										
			<?php
                            $index++;
                            if($index == $num_ads2){
                                break; 
                            }
                    ?> 
		<?php View::newInstance()->_erase('items'); } ?>
  
					</div>

			 <script type="text/javascript" src="oc-content/themes/next_revo/js/slick/slick.js"></script>
      <script>
        $(document).ready(function(){
            $('.slider').slick({
              slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,
    responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
      }
    },
	 {
      breakpoint: 640,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
      }
    }
	]
            });
        });
    </script>
	<?php } ?>	
	<?php } else {?>							 
	<div style="clear:both"></div>
<?php } ?>	
	</div>
<div style="clear:both"></div>