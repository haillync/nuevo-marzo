<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */


?>
 <form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
        <input type="hidden" name="page" value="search"/>
<div class="main-search">
            <div class="cell">
                <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'next_revo'), 'next_revo')); ?>" />
            </div>

                <div class="cell selector1">
				
                    <?php osc_categories_select('sCategory', null, __('Select a category', 'next_revo')) ; ?>
                      
                </div>
				 <div class="cell selector">
				<?php if(revo_regioncity_main() == 'inc.search'){
					next_region_select();
					} elseif(revo_regioncity_main() == 'inc.search.items'){
				    next_region_select_items();
					} elseif(revo_regioncity_main() == 'inc.search.city'){
				    revo_city_select();
					} elseif(revo_regioncity_main() == 'inc.search.city.items'){
				    revo_city_select_items();
					} elseif(revo_regioncity_main() == 'inc.search.country'){
				   revo_country_select();
				   } else{	   
					  } ?>
                </div>
                <div class="cell reset-padding">

                <button class="ui-button ui-button-big js-submit"><span><i class="fa fa-search"></i><?php _e("Search", 'next_revo');?></span></button>

        </div>
        <div id="message-seach"></div>
 

</div>
   </form>

        <div class="search-line"></div>
<div style="clear:both"></div>