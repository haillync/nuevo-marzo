<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">

    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
		<div style="clear:both"></div>
		<div class="form_publish_main">
<?php osc_current_web_theme_path('inc.search.php') ; ?>
        </div>
		<div class="clear"></div>
<?php osc_current_web_theme_path('inc.main.top.php') ; ?>
		   <div class="clear"></div>
        <div class="content home">
            <div id="main">
                <?php if(revo_catshow_as() == 'inc.main.category'){?>
<?php osc_current_web_theme_path('inc.main.category.php') ; ?>
<?php } else{?>
<?php osc_current_web_theme_path('inc.main.php') ; ?>
<?php } ?>
				<?php osc_current_web_theme_path('inc.main.after.php') ; ?>				
               <div class="latest_ads">
			   			    <?php if( osc_get_preference('main-nextrevo-top', 'next_revo') != '') {?>
                <div class="top_main_a">
                    <?php echo osc_get_preference('main-nextrevo-top', 'next_revo'); ?>					
                </div>
				<br>
                <?php } ?>	
			   <div class="inner">
                  <strong><h1><?php echo "Los últimos Avisos"; ?></h1></strong>
					<p class="see_by">
				<?php $params['sShowAs'] = 'gallery'; ?><a href="<?php echo osc_base_url(true); ?>?sShowAs=gallery"><i class="fa fa-th fa-2-1x"></i></a>
      &nbsp;<?php $params['sShowAs'] = 'list'; ?><a href="<?php echo osc_base_url(true); ?>?sShowAs=list"><i class="fa fa-th-list fa-2-1x"></i></a>
				 </p></div>				
					<?php osc_reset_latest_items(); ?> 
                    <?php if( osc_count_latest_items() == 0) { ?>
                        <p class="empty"><?php _e('No Latest Listings', 'next_revo'); ?></p>
                    <?php } else { ?>				
	<?php if(next_show_as() == 'gallery'){?>	
	 <?php $class = "even"; $index1 = 0;?>
                                <?php while(osc_has_latest_items()) { $index1++; ?>
                                <div class="next_item">
	<div class="item_box" ><div class="item"><div class="next_revo"><div class="next_revo2">
	<div class="title"><h2><a href="<?php echo osc_item_url(); ?>"><?php if(strlen(osc_item_title()) > 51){ echo mb_substr(osc_item_title(), 0, 50,'UTF-8').'...'; } else { echo osc_item_title(); } ?></a></h2></div>
	<div class="next_revo_detail">
	<div class="item_img"><?php if( osc_count_item_resources() ) { ?><a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="196" height="110" alt="<?php echo osc_item_title(); ?>"/></a><?php } else { ?>
                                                <img src="<?php echo osc_current_web_theme_url('images/big/') . osc_item_category_id() .'.png' ?>" width="196" height="110" alt="" title="" />
                                            <?php } ?></div>
											<div class="region">&nbsp;<i class="fa fa-map-marker fa-lm"></i>&nbsp;&nbsp;&nbsp;<?php echo osc_item_city();?></div>
											<!--<div class="price">&nbsp;<i class="fa fa-tag fa-lm"></i>&nbsp;&nbsp;</span><?php echo osc_item_formated_price(); ?></div>-->
											<div class="revo_bottom"></div><div class="see_details_box"><a class="see_details" href="<?php echo osc_item_url(); ?>" ><?php _e('More', 'next_revo') ; ?></a></div></div></div></div></div></div></div>
                                    <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
									<?php if( $index1 == 5 ) { ?>
                                <?php } ?>
                                <?php } ?>   
    <?php } else{?>
	 <?php $class = "even"; $index1 = 0; ?>
                                <?php while(osc_has_latest_items()) { $index1++; ?>
								<div style="clear:both"></div>	
                                <div class="estate" >
                <div class="left" >
                    <a href="<?php echo osc_item_url() ; ?>"><?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if( osc_count_item_resources() ) { ?>
                            <img src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_item_title(); ?>" alt="<?php echo osc_item_title(); ?>"/>
                        <?php } else { ?>
                            <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="" title=""/>
                        <?php } ?>             
                    <?php } ?>
                    
                    </a>
                </div>
                <div class="right">
                    <div class="title">
                        <h3><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ),100 ); ?></a></h3> </div>
						<div class="list_des">
						<?php if(strlen(osc_item_description()) > 531){ echo strip_tags( mb_substr(osc_item_description(), 0, 530,'UTF-8').'...'); } else { echo strip_tags (osc_item_description()); } ?>
						</div>
					<div class="more" style="display:inline;">			
                    <div class="city" style="float:left;">&nbsp;&nbsp;<i class="fa fa-map-marker fa-lm2"></i>&nbsp;<?php echo osc_item_city();?></div>
                    <div class="data" style="float:right;"><i class="fa fa-clock-o fa-lm2"></i>&nbsp;<?php echo osc_format_date(osc_item_pub_date()); ?></div>
					</div>
                </div>
            </div><br>
                                    <?php $class = ($class == 'even') ? 'odd' : 'even'; ?>
									<?php if( $index1 == osc_get_preference('main-middle', 'next_revo') ) { ?>
									<?php osc_run_hook('main_middle'); ?>
                                <?php } ?>
						<?php } ?>	
	<?php } ?>
                  
                        <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
                    		<?php if( osc_get_preference('main-nextrevo-under', 'next_revo') != '') {?>
							<div style="clear:both"></div>
                <div class="top_main_u">
                    <?php echo osc_get_preference('main-nextrevo-under', 'next_revo'); ?>
                </div>
				
                <?php } ?> 
                        <div class="paginate" >
                    <a href="<?php echo osc_search_show_all_url();?>" class="ui-button_main"><?php _e("See all offers", 'next_revo'); ?> </a></p>
                </div>
                        <?php } ?>
                    <?php View::newInstance()->_erase('items'); } ?>
                </div>
					
		<div style="clear:both"></div> 	</div>
            </div>
          
        </div>
		</div>
<!-- /container -->
<div style="clear:both"></div>	
<div id="next_main_region">		
		<div class="region-main">
							<div class="container_reg">
<?php if(osc_get_preference('main-regcity', 'next_revo') == 'regions') {?>						
<ul class="menu">
 <?php View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=','region_name ASC') ) ; ?>
                        <?php if(osc_count_list_regions() > 0) {?>
                            <?php while(osc_has_list_regions()) { ?>
                                <li><a href="<?php echo osc_list_region_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_region_name();?></a> </li>
                            <?php } ?>
                          
                        <?php } ?>

</ul>
<?php } elseif(osc_get_preference('main-regcity', 'next_revo') == 'regionsitems') {?>						
<ul class="menu">
                        <?php if(osc_count_list_regions() > 0) {?>
                            <?php while(osc_has_list_regions()) { ?>
                                <li><a href="<?php echo osc_list_region_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_region_name();?></a> </li>
                            <?php } ?>
                          
                        <?php } ?>

</ul>
<?php } elseif(osc_get_preference('main-regcity', 'next_revo') == 'cities'){?>
<ul class="menu">
 <?php View::newInstance()->_exportVariableToView('list_cities', Search::newInstance()->listCities('%%%%', '>=','city_name ASC') ) ; ?>
                        <?php if(osc_count_list_cities() > 0) {?>
                            <?php while(osc_has_list_cities()) { ?>
                                <li><a href="<?php echo osc_list_city_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_city_name();?></a> </li>
                            <?php } ?>
                          
                        <?php } ?>

</ul>
<?php } elseif(osc_get_preference('main-regcity', 'next_revo') == 'citiesitems'){?>
<ul class="menu">
                        <?php if(osc_count_list_cities() > 0) {?>
                            <?php while(osc_has_list_cities()) { ?>
                                <li><a href="<?php echo osc_list_city_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_city_name();?></a> </li>
                            <?php } ?>
                          
                        <?php } ?>

</ul>
<?php } elseif(osc_get_preference('main-regcity', 'next_revo') == 'countries'){?>
<ul class="menu">
                        <?php if(osc_count_list_countries() > 0) {?>
                            <?php while(osc_has_list_countries()) { ?>
                                <li><a href="<?php echo osc_list_country_url(); ?>"><i class="fa fa-map-marker-i fa-lm2"></i>&nbsp;<?php echo osc_list_country_name();?></a> </li>
                            <?php } ?>
                          
                        <?php } ?>

</ul>
										<?php } else {?>							 
	<div class="clearfix"></div>
<?php } ?>
		</div>
										</div>
							</div>
		<?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
