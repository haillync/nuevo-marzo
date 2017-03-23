<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/admin.css');?>">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<div class="credit-osclasspro"> <a href="https://osclass-pro.com/" target="_blank" class="pro_logo"> <img src="<?php echo osc_current_web_theme_url('admin/img/logo.png');?>" alt="Premium themes and plugins" title="Premium themes and plugins" /> </a>
  <div class="follow">
    <ul>
      <li>Follow us:</li>
      <li><a href="https://www.facebook.com/osclassprocom" target="_blank" title="facebook"><img src="<?php echo osc_current_web_theme_url('images/facebook.png'); ?>" alt=""></a></li>
      <li><a href="https://twitter.com/osclass_pro_com" target="_blank" title="twitter"><img src="<?php echo osc_current_web_theme_url('images/twitter.png'); ?>" alt=""></a></li>
      <li><a href="https://plus.google.com/107706977667016834969/posts" target="_blank" title="google plus"><img src="<?php echo osc_current_web_theme_url('images/google.png'); ?>" alt=""></a></li>
    </ul>
  </div>
  <div class="donate">
    <form name="_xclick" action="https://www.paypal.com/in/cgi-bin/webscr" method="post" class="nocsrf">
      <input type="hidden" name="cmd" value="_donations">
      <input type="hidden" name="business" value="support@osclass-pro.com">
      <input type="hidden" name="item_name" value="osclass-pro.com">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="lc" value="US" />
      <div id="flashmessage" >
        <p>
          <select name="amount" class="select-box-medium">
            <option value="10" selected>10$</option>
            <option value="5">5$</option>
            <option value="">
            <?php _e('Custom', 'next_revo'); ?>
            </option>
          </select>
          <input type="submit" class="btn btn-mini" name="submit" value="<?php echo osc_esc_html(__('Donate', 'next_revo')); ?>">
        </p>
      </div>
    </form>
  </div>
</div>
<div class="clear"></div>
<div id="tabs" class="FinoTab">
<ul>
    <li><a href="#general"><?php _e('Theme settings', 'next_revo'); ?></a></li>
    <li><a href="#social"><?php _e('Social links', 'next_revo'); ?></a></li>
	<li><a href="#ads"><?php _e('Ads management', 'next_revo'); ?></a></li>
	<li><a href="#related"><?php _e('Related ads', 'next_revo'); ?></a></li>
	<li><a href="#help"><?php _e('Help', 'next_revo'); ?></a></li>
 </ul>
    <div id="general">
<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'next_revo') ? '' : 'separate-top'); ?>"><?php _e('Theme settings', 'next_revo'); ?></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/next_revo/admin/settings.php'); ?>" method="post">
    <input type="hidden" name="action_specific" value="settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><b><?php _e('Search placeholder', 'next_revo'); ?></b></div>
                <div class="form-controls"><input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'next_revo') ); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><b><?php _e('Footer link', 'next_revo'); ?></b></div>
                <div class="form-controls">
                    <div class="form-label-checkbox"><input type="checkbox" name="footer_link" value="1" <?php echo (osc_get_preference('footer_link', 'next_revo') ? 'checked' : ''); ?> > <?php _e("I want to help OSClass by linking to <a href=\"http://osclass.org/\" target=\"_blank\">osclass.org</a> from my site with the following text:", 'next_revo'); ?></div>
                    <span class="help-box"><?php _e('This website is proudly using the <a title="OSClass web" href="http://osclass.org/">classifieds scripts</a> software <strong>OSClass</strong>', 'next_revo'); ?></span>
                </div>
            </div>
        </div>
    </fieldset>
	<div class="form-row">
                <div class="form-label"><b><?php _e('Show lists as:', 'next_revo'); ?></b></div>
                <div class="form-controls">
                    <select name="defaultShowAs@all">
                        <option value="gallery" <?php if(next_default_show_as() == 'gallery'){ echo 'selected="selected"' ; } ?>><?php _e('Gallery','next_revo'); ?></option>
                        <option value="list" <?php if(next_default_show_as() == 'list'){ echo 'selected="selected"' ; } ?>><?php _e('List','next_revo'); ?></option>
                    </select>
                </div>
            </div>
  <div class="form-row">
                <div class="form-label"><b><?php _e('Select color:', 'next_revo'); ?></b></div>
                <div class="form-controls">
                    <select name="revoColor@all">
					        <option value="blue" <?php if(revo_color() == 'blue'){ echo 'selected="selected"' ; } ?>><?php _e('Blue','next_revo'); ?></option>
                            <option value="coral" <?php if(revo_color() == 'coral'){ echo 'selected="selected"' ; } ?>><?php _e('Coral','next_revo'); ?></option>
							<option value="cornsilk" <?php if(revo_color() == 'cornsilk'){ echo 'selected="selected"' ; } ?>><?php _e('Cornsilk','next_revo'); ?></option>	
							<option value="cyan" <?php if(revo_color() == 'cyan'){ echo 'selected="selected"' ; } ?>><?php _e('Cyan','next_revo'); ?></option>					
                            <option value="green" <?php if(revo_color() == 'green'){ echo 'selected="selected"' ; } ?>><?php _e('Green','next_revo'); ?></option>
							<option value="hotpink" <?php if(revo_color() == 'hotpink'){ echo 'selected="selected"' ; } ?>><?php _e('Hotpink','next_revo'); ?></option>
							<option value="orange" <?php if(revo_color() == 'orange'){ echo 'selected="selected"' ; } ?>><?php _e('Orange','next_revo'); ?></option>
							<option value="orchid" <?php if(revo_color() == 'orchid'){ echo 'selected="selected"' ; } ?>><?php _e('Orchid','next_revo'); ?></option>
							<option value="purple" <?php if(revo_color() == 'purple'){ echo 'selected="selected"' ; } ?>><?php _e('Purple','next_revo'); ?></option>
							<option value="slategray" <?php if(revo_color() == 'slategray'){ echo 'selected="selected"' ; } ?>><?php _e('Slategray','next_revo'); ?></option>
							</select>
                </div>
            </div>
			<div class="form-row">
			<div class="form-label"><b><?php _e('Search select option for Main page:', 'next_revo'); ?></b></div>
                <div class="form-label"><?php _e('Search select option(Use Cities in the search, if you have a single region or not many regions.', 'next_revo'); ?></div>
			<div class="form-label"><?php _e('If you have many regions or countries. Home page can be opened for a long time with Cities options.)', 'next_revo'); ?></div>

<div class="form-controls">
                    <select name="main-search">
             <option value="inc.search" <?php if(revo_regioncity_main() == 'inc.search'){ echo 'selected="selected"' ; } ?>><?php _e('With All Regions','next_revo'); ?></option>
			 <option value="inc.search.items" <?php if(revo_regioncity_main() == 'inc.search.items'){ echo 'selected="selected"' ; } ?>><?php _e('Regions with items','next_revo'); ?></option>
             <option value="inc.search.city" <?php if(revo_regioncity_main() == 'inc.search.city'){ echo 'selected="selected"' ; } ?>><?php _e('With All Cities','next_revo'); ?></option>
             <option value="inc.search.city.items" <?php if(revo_regioncity_main() == 'inc.search.city.items'){ echo 'selected="selected"' ; } ?>><?php _e('Cities with items','next_revo'); ?></option>
			 <option value="inc.search.country" <?php if(revo_regioncity_main() == 'inc.search.country'){ echo 'selected="selected"' ; } ?>><?php _e('Countries with items','next_revo'); ?></option>
			 <option value="inc.search.hide" <?php if(revo_regioncity_main() == 'inc.search.hide'){ echo 'selected="selected"' ; } ?>><?php _e('Hide','next_revo'); ?></option>
			 </select>  
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('Slider in Main page:', 'next_revo'); ?></b></div>

<div class="form-controls">
                    <select name="main-slider-tip">
                        <option value="premium" <?php if(osc_get_preference('main-slider-tip', 'next_revo') == 'premium'){ echo 'selected="selected"' ; } ?>><?php _e('Premium items','next_revo'); ?></option>
                        <option value="popular" <?php if(osc_get_preference('main-slider-tip', 'next_revo') == 'popular'){ echo 'selected="selected"' ; } ?>><?php _e('Popular items','next_revo'); ?></option>
						<option value="hide" <?php if(osc_get_preference('main-slider-tip', 'next_revo') == 'hide'){ echo 'selected="selected"' ; } ?>><?php _e('Hide','next_revo'); ?></option>
</select>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('No. of items in Slider:', 'next_revo'); ?></b></div>
                <div class="form-controls">
					<input type="text" class="input-small" name="main-slider" value="<?php echo osc_get_preference('main-slider', 'next_revo'); ?>" />
                </div>
            </div>
						<div class="form-row">
                <div class="form-label"><b><?php _e('Category Style in Main page:', 'next_revo'); ?></b></div>

<div class="form-controls">
                    <select name="inc-main-cat">
                        <option value="inc.main" <?php if(revo_category_main() == 'inc.main'){ echo 'selected="selected"' ; } ?>><?php _e('With Subcategories','next_revo'); ?></option>
                        <option value="inc.main.category" <?php if(revo_category_main() == 'inc.main.category'){ echo 'selected="selected"' ; } ?>><?php _e('Only Categories','next_revo'); ?></option>
</select>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('Carousel in Main page:', 'next_revo'); ?></b></div>

<div class="form-controls">
                    <select name="main-carousel-tip">
                        <option value="premium" <?php if(osc_get_preference('main-carousel-tip', 'next_revo') == 'premium'){ echo 'selected="selected"' ; } ?>><?php _e('Premium items','next_revo'); ?></option>
                        <option value="popular" <?php if(osc_get_preference('main-carousel-tip', 'next_revo') == 'popular'){ echo 'selected="selected"' ; } ?>><?php _e('Popular items','next_revo'); ?></option>
						<option value="hide" <?php if(osc_get_preference('main-carousel-tip', 'next_revo') == 'hide'){ echo 'selected="selected"' ; } ?>><?php _e('Hide','next_revo'); ?></option>
</select>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('No. of items in Carousel:', 'next_revo'); ?></b></div>
                <div class="form-controls">
					<input type="text" class="input-small" name="main-carousel" value="<?php echo osc_get_preference('main-carousel', 'next_revo'); ?>" />
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('Footer in Main page:', 'next_revo'); ?></b></div>
<div class="form-label"><?php _e('Use the city in the footer, if you have a single region or not many regions.', 'next_revo'); ?></div>
			<div class="form-label"><?php _e('If you have many regions or countries. Home page can be opened for a long time with city option.)', 'next_revo'); ?></div>
<div class="form-label"><?php _e('Before select this option, Show more - Tools -Locations stats - Calculate location stats.)', 'next_revo'); ?></div>
			<div class="form-controls">
                    <select name="main-regcity">
                        <option value="regions" <?php if(osc_get_preference('main-regcity', 'next_revo') == 'regions'){ echo 'selected="selected"' ; } ?>><?php _e('With all regions','next_revo'); ?></option>
                        <option value="regionsitems" <?php if(osc_get_preference('main-regcity', 'next_revo') == 'regionsitems'){ echo 'selected="selected"' ; } ?>><?php _e('Regions with Items','next_revo'); ?></option>
						<option value="cities" <?php if(osc_get_preference('main-regcity', 'next_revo') == 'cities'){ echo 'selected="selected"' ; } ?>><?php _e('With all cities','next_revo'); ?></option>
						<option value="citiesitems" <?php if(osc_get_preference('main-regcity', 'next_revo') == 'citiesitems'){ echo 'selected="selected"' ; } ?>><?php _e('Cities with Items','next_revo'); ?></option>
						<option value="countries" <?php if(osc_get_preference('main-regcity', 'next_revo') == 'countries'){ echo 'selected="selected"' ; } ?>><?php _e('Countries with Items','next_revo'); ?></option>
						<option value="hide" <?php if(osc_get_preference('main-regcity', 'next_revo') == 'hide'){ echo 'selected="selected"' ; } ?>><?php _e('Hide','next_revo'); ?></option>
</select>
                </div>
            </div>
			<div class="form-actions">
				<input id="button" type="submit" value="<?php echo osc_esc_html(__('Save changes','next_revo')); ?>" class="btn btn-submit">
			</div>
			</form>
			</div>
  <div id="social">
    <?php include 'social.php'; ?>
  </div>
  <div id="ads">
    <?php include 'ads.php'; ?>
  </div>
  <div id="related">
    <?php include 'related.php'; ?>
  </div>
  <div id="help">
    <?php include 'help.php'; ?>
  </div>
  
<address class="osclasspro_address">
	<span>&copy; <?php echo date('Y') ?>  <strong><a target="_blank" title="osclass-pro.com" href="https://osclass-pro.com/">OSCLASS-PRO.COM</a></strong>. All rights reserved.</span>
  </p>
  </address>
			</div>
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.admin.js');?>"></script>

    
