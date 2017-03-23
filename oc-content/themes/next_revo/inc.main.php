<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<?php
    function drawSubcategory($category) {
        if ( osc_count_subcategories2() > 0 ) {
            osc_category_move_to_children();
		
            ?>
            <ul>
                <?php while ( osc_has_categories() ) { ?>
                    <li><a class="category cat_<?php echo osc_category_id(); ?>" href="<?php echo osc_search_category_url(); ?>"><?php echo osc_category_name(); ?></a> <span>(<?php echo osc_category_total_items(); ?>)</span><?php drawSubcategory(osc_category()); ?></li>
                <?php } ?>
            </ul>
				  	
        <?php
            osc_category_move_to_parent();
        }

    }
 $total_categories   = osc_count_categories();
?>
<div class="categories <?php echo 'c' . $total_categories; ?>">
    <?php osc_goto_first_category(); ?>

    <?php while ( osc_has_categories() ) { ?>
	    <div class="col c1">
	    <div class="box_category">
        <div class="category">
		<div class="cat-header">
		<div class="cat-icon">
 <a class="category cat_<?php echo osc_category_id(); ?>" href="<?php echo osc_search_category_url(); ?>"><div class="focus"><img src="<?php echo osc_current_web_theme_url('images/') . osc_category_id() .'.png' ?>" /></div></a></div> 
            <div class="cat-title"><h1><strong><a class="category cat_<?php echo osc_category_id(); ?>" href="<?php echo osc_search_category_url(); ?>"><?php if(strlen(osc_category_name()) > 25){ echo mb_substr(osc_category_name(), 0, 23,'UTF-8').'...'; } else { echo osc_category_name(); } ?> </a></strong></h1></div> </div>
		     <?php if ( osc_count_subcategories() > 0 ) { ?>
                   <ul class="subcat_i">
                         
      <?php $num = 0; while ( osc_has_subcategories() && $num < 5) { ?>
                             <li class="subcat_i">
                             <a class="category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php if(strlen(osc_category_name()) > 31){ echo mb_substr(osc_category_name(), 0, 30,'UTF-8').'...'; } else { echo osc_category_name(); } ?><span class="cat_i"><?php echo osc_category_total_items() ; ?></span></a> 
                             </li>
<?php $num++;} ?>
                                       


	 <?php View::newInstance()->_erase('subcategories') ; ?>
	 	<li class="subcat_i"><a class="category cat_last" href="<?php echo osc_search_category_url(); ?>"><span><?php _e('View all subcategories', 'next_revo'); ?></span></a> </li>
                   </ul>
                 <?php } ?>			

        </div></div>
       </div>

<?php } ?>
</div>

