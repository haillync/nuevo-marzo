<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */


?>
<?php $num_ads = revo_main_slider_num_ads() ; ?>
<?php if( revo_slider_as() == 'premium') {?>
		<?php osc_get_premiums($num_ads); ?>
                <?php if( osc_count_premiums() == 0) { ?>
				<br>
                <?php } else { ?>
				<div class="title" style="text-align:center; font-size: 14px;"><h3><i class="fa fa-star"></i>
<?php _e('Premium listings', 'next_revo'); ?> <i class="fa fa-star"></i>
</h3></div>
				<style>
        /* jssor slider bullet navigator skin 21 css */
        /*
            .jssorb21 div           (normal)
            .jssorb21 div:hover     (normal mouseover)
            .jssorb21 .av           (active)
            .jssorb21 .av:hover     (active mouseover)
            .jssorb21 .dn           (mousedown)
            */
        .jssorb21 div, .jssorb21 div:hover, .jssorb21 .av {
            background: url(oc-content/themes/next_revo/images/b21.png) no-repeat;
            overflow: hidden;
            cursor: pointer;
        }

        .jssorb21 div {
            background-position: -5px -5px;
        }

            .jssorb21 div:hover, .jssorb21 .av:hover {
                background-position: -95px -5px;
            }

        .jssorb21 .av {
            background-position: -95px -5px;
        }

        .jssorb21 .dn, .jssorb21 .dn:hover {
            background-position: -95px -5px;
        }
    </style>

    <!-- Arrow Navigator Style -->
    <style>
        /* jssor slider arrow navigator skin 21 css */
        /*
            .jssora21l              (normal)
            .jssora21r              (normal)
            .jssora21l:hover        (normal mouseover)
            .jssora21r:hover        (normal mouseover)
            .jssora21ldn            (mousedown)
            .jssora21rdn            (mousedown)
            */
        .jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn {
            position: absolute;
            cursor: pointer;
            display: block;
            background: url(oc-content/themes/next_revo/images/arrows2.png) center center no-repeat;
            overflow: hidden;
        }

        .jssora21l {
            background-position: -8px -43px;
        }

        .jssora21r {
            background-position: -145px -43px;
        }

        .jssora21l:hover {
            background-position: -8px -3px;
        }

        .jssora21r:hover {
            background-position: -145px -3px;
        }

        .jssora21ldn {
            background-position: -243px -33px;
        }

        .jssora21rdn {
            background-position: -303px -33px;
        }

    </style>
				 <script type="text/javascript" src="oc-content/themes/next_revo/js/jssor.js"></script>
    <script type="text/javascript" src="oc-content/themes/next_revo/js/jssor.slider.js"></script>
    <script>
         jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                      $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },
				$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },


            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1000));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
				<div id="slider1_container" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1000px; height: 400px; overflow: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(oc-content/themes/next_revo/images/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        <!-- Slides Container -->
        <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1000px;
            height: 400px; overflow: hidden;">
				          
                  <?php  $index = 0;
				         
                ?>
			
                    <?php while ( osc_has_premiums() ) {
                        ?>
          
            <div style="display: none;">
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 0px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 26px; font-weight: 600;
                                color: #372F2B; padding-left:10px; text-shadow:0 1px 0 #fff;"><?php if(strlen(osc_premium_title()) > 51){ echo mb_substr(osc_premium_title(), 0, 50,'UTF-8').'...'; } else { echo osc_premium_title(); } ?></span>
 <br/>
<div class="slide_p" style="position: absolute; width: 480px; height: 1px; "></div>                         
                            <span style="display: block; line-height: 1.1em; font-size: 1.6em; font-weight: 600; color: #372F2B; padding-left:10px;padding-top:10px;">
                             <i class="fa fa-tag"></i>&nbsp;<?php echo osc_premium_formated_price(); ?>
                            </span>
							<span style="display: block; line-height: 1.1em; font-size: 1.6em; font-weight: 600; color: #372F2B; padding-left:10px;padding-top:10px;">
							<i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php  echo osc_premium_city(); ?></span>
                           
                            <span style="display: block; line-height: 1.1em; font-size: 1.4em; font-weight: 500; color: #372F2B; padding-left:10px;padding-top:10px;">
                                <?php echo osc_highlight( strip_tags( osc_premium_description() ) ); ?>
                            </span>
                            <a href="<?php echo osc_premium_url() ; ?>" style="text-decoration: none;">
							<div id="slidebut" style="position:relative;left: 120px; font-size: 1.6em; font-weight: 500; padding-top:10px;"><i class="fa fa-link"></i>
<?php _e('Read More', 'next_revo'); ?></i>
</div>                            
                            </a>
                        </div>
						<?php if( osc_images_enabled_at_items() ) { ?>
                                    <?php if( osc_count_premium_resources() ) { ?>
	
                                        <img src="<?php echo osc_resource_url() ; ?>" style="position: absolute; top: 18px; left: 500px; width: 500px; height: 300px;"  />

                                    <?php } else { ?>
                                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>"  style="position: absolute; top: 18px; left: 500px; width: 500px; height: 300px;"  />
                                    <?php } ?>
                    </div>

                            
                          
                        
                    <?php
                            $index++;
                            if($index == $num_ads){
                                break; 
                            }
                        }
                    ?>  
   
			
				
                
                <?php View::newInstance()->_erase('items') ;
                } ?>
        </div>
                
        <!-- Bullet Navigator Skin Begin -->
        <!-- bullet navigator container -->
        <div data-u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:#fff; font-size:12px;"></div>
        </div>
        <!-- Bullet Navigator Skin End -->

        <!-- Arrow Navigator Skin Begin -->
        <!-- Arrow Left -->
        <span data-u="arrowleft" class="jssora21l" style="width: 35px; height: 35px; top: 113px; left: 18px;">
        </span>
        <!-- Arrow Right -->
        <span data-u="arrowright" class="jssora21r" style="width: 35px; height: 35px; top: 113px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->

    </div>
	<?php } ?>
	<?php } elseif(revo_slider_as() == 'popular'){?>
	<?php next_popular_ads_start();?>
	<?php if( osc_count_custom_items() == 0) { ?>
                        <br>
                    <?php } else { ?>
									<div class="title" style="text-align:center; font-size: 14px;"><h3><i class="fa fa-star"></i>
<?php _e('Avisos y Comunicados', 'next_revo'); ?> <i class="fa fa-star"></i>
</h3></div>
<style>
        /* jssor slider bullet navigator skin 21 css */
        /*
            .jssorb21 div           (normal)
            .jssorb21 div:hover     (normal mouseover)
            .jssorb21 .av           (active)
            .jssorb21 .av:hover     (active mouseover)
            .jssorb21 .dn           (mousedown)
            */
        .jssorb21 div, .jssorb21 div:hover, .jssorb21 .av {
            background: url(oc-content/themes/next_revo/images/b21.png) no-repeat;
            overflow: hidden;
            cursor: pointer;
        }

        .jssorb21 div {
            background-position: -5px -5px;
        }

            .jssorb21 div:hover, .jssorb21 .av:hover {
                background-position: -95px -5px;
            }

        .jssorb21 .av {
            background-position: -95px -5px;
        }

        .jssorb21 .dn, .jssorb21 .dn:hover {
            background-position: -95px -5px;
        }
    </style>

    <!-- Arrow Navigator Style -->
    <style>
        /* jssor slider arrow navigator skin 21 css */
        /*
            .jssora21l              (normal)
            .jssora21r              (normal)
            .jssora21l:hover        (normal mouseover)
            .jssora21r:hover        (normal mouseover)
            .jssora21ldn            (mousedown)
            .jssora21rdn            (mousedown)
            */
        .jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn {
            position: absolute;
            cursor: pointer;
            display: block;
            background: url(oc-content/themes/next_revo/images/arrows2.png) center center no-repeat;
            overflow: hidden;
        }

        .jssora21l {
            background-position: -8px -43px;
        }

        .jssora21r {
            background-position: -145px -43px;
        }

        .jssora21l:hover {
            background-position: -8px -3px;
        }

        .jssora21r:hover {
            background-position: -145px -3px;
        }

        .jssora21ldn {
            background-position: -243px -33px;
        }

        .jssora21rdn {
            background-position: -303px -33px;
        }

    </style>
				 <script type="text/javascript" src="oc-content/themes/next_revo/js/jssor.js"></script>
    <script type="text/javascript" src="oc-content/themes/next_revo/js/jssor.slider.js"></script>
    <script>
         jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                      $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },
				$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },


            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1000));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
				<div id="slider1_container" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1000px; height: 400px; overflow: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(oc-content/themes/next_revo/images/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        <!-- Slides Container -->
        <div data-u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1000px;
            height: 400px; overflow: hidden;">
			 <?php  $index = 0;				         
                ?>								 
        <?php while(osc_has_custom_items()) { ?>
		<?php if( osc_count_item_resources() ) { ?>
		<div style="display: none;">
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 0px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 26px; font-weight: 600;
                                color: #372F2B; padding-left:10px; text-shadow:0 1px 0 #fff;"><?php if(strlen(osc_item_field('s_title')) > 51){ echo mb_substr(osc_item_field('s_title'), 0, 50,'UTF-8').'...'; } else { echo osc_item_field('s_title'); } ?></span>
 <br/>
<div class="slide_p" style="position: absolute; width: 480px; height: 1px; "></div>                         
                            <span style="display: block; line-height: 1.1em; font-size: 1.6em; font-weight: 600; color: #372F2B; padding-left:10px;padding-top:10px;">
                             <i class="fa fa-tag"></i>&nbsp;<?php echo osc_item_formated_price(); ?>
                            </span>
							<span style="display: block; line-height: 1.1em; font-size: 1.6em; font-weight: 600; color: #372F2B; padding-left:10px;padding-top:10px;">
							<i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php  echo osc_item_city(); ?></span>
                           
                            <span style="display: block; line-height: 1.1em; font-size: 1.4em; font-weight: 500; color: #372F2B; padding-left:10px;padding-top:10px;">
                                <?php echo osc_highlight( strip_tags(osc_item_field('s_description'))); ?>
                            </span>
                            <a href="<?php echo osc_item_url() ; ?>" style="text-decoration: none;">
							<div id="slidebut" style="position:relative; left: 120px; font-size: 1.6em; font-weight: 500; padding-top:10px;"><i class="fa fa-link"></i>
<?php _e('Read More', 'next_revo'); ?></i>
</div>                            
                            </a>
                        </div>
						<?php if( osc_images_enabled_at_items() ) { ?>

                                        <img src="<?php echo osc_resource_url() ; ?>" style="position: absolute; top: 18px; left: 500px; width: 500px; height: 300px;"  />

                                    <?php } else { ?>
                                        <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>"  style="position: absolute; top: 18px; left: 500px; width: 500px; height: 300px;"  />
                                    <?php } ?>
						
                    </div>
					<?php
                            $index++;
                            if($index == $num_ads){
                                break; 
                            }
                        }
                    ?>  
   
			
				
                
                <?php View::newInstance()->_erase('items') ;
                } ?>
        </div>
                
        <!-- Bullet Navigator Skin Begin -->
        <!-- bullet navigator container -->
        <div data-u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:#fff; font-size:12px;"></div>
        </div>
        <!-- Bullet Navigator Skin End -->

        <!-- Arrow Navigator Skin Begin -->
        <!-- Arrow Left -->
        <span data-u="arrowleft" class="jssora21l" style="width: 35px; height: 35px; top: 113px; left: 18px;">
        </span>
        <!-- Arrow Right -->
        <span data-u="arrowright" class="jssora21r" style="width: 35px; height: 35px; top: 113px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->

    </div>
	<?php } ?>
	<?php } else {?>							 
	<div style="clear:both"></div>
<?php } ?>		
<div style="clear:both"></div>