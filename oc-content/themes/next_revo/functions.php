<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

    define('NEXT_REVO_THEME_VERSION', '3.2.2');
	

    function next_region_select() {
        View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=', 'region_name ASC') ) ;

        if( osc_count_list_regions() > 0 ) {
            echo '<select name="sRegion">' ;
			echo '<option value="">' . __('Select a region', 'next_revo') . '</option>' ;
            while( osc_has_list_regions() ) {
			   
                echo '<option value="' . osc_list_region_name() . '">' . osc_list_region_name() . '</option>' ;
            }
            echo '</select>' ;
        }

        View::newInstance()->_erase('list_regions') ;
    }
	function next_region_select_items() {
        if( osc_count_list_regions() > 0 ) {
            echo '<select name="sRegion">' ;
			echo '<option value="">' . __('Select a region', 'next_revo') . '</option>' ;
            while( osc_has_list_regions() ) {
			   
                echo '<option value="' . osc_list_region_name() . '">' . osc_list_region_name() . '</option>' ;
            }
            echo '</select>' ;
        }
    }
	function revo_city_select() {
        View::newInstance()->_exportVariableToView('list_cities', Search::newInstance()->listCities('%%%%', '>=', 'city_name ASC') ) ;

        if( osc_count_list_cities() > 0 ) {
            echo '<select id="sCity" name="sCity">' ;
			echo '<option value="">' . __('Select a city', 'next_revo') . '</option>' ;
            while( osc_has_list_cities() ) {
			   
                echo '<option value="' . osc_list_city_name() . '">' . osc_list_city_name() . '</option>' ;
            }
            echo '</select>' ;
        }

        View::newInstance()->_erase('list_cities') ;
    }
	function revo_city_select_items() {
        if( osc_count_list_cities() > 0 ) {
            echo '<select id="sCity" name="sCity">' ;
			echo '<option value="">' . __('Select a city', 'next_revo') . '</option>' ;
            while( osc_has_list_cities() ) {
			   
                echo '<option value="' . osc_list_city_name() . '">' . osc_list_city_name() . '</option>' ;
            }
            echo '</select>' ;
        }
    }
	function revo_country_select() {
				View::newInstance()->_exportVariableToView('list_countries', Search::newInstance()->listCountries('>=', 'country_name ASC') ) ;

        if( osc_count_list_countries() > 0 ) {
            echo '<select id="sCountry" name="sCountry">' ;
			echo '<option value="">' . __('Select a country', 'next_revo') . '</option>' ;
            while( osc_has_list_countries() ) {
			   
                echo '<option value="' . osc_list_country_name() . '">' . osc_list_country_name() . '</option>' ;
            }
            echo '</select>' ;
        }
		View::newInstance()->_erase('list_countries') ;
    }


    if( !OC_ADMIN ) {
        if( !function_exists('add_close_button_action') ) {
            function add_close_button_action(){
                echo '<script type="text/javascript">';
                    echo '$(".flashmessage .ico-close").click(function(){';
                        echo '$(this).parent().hide();';
                    echo '});';
                echo '</script>';
            }
            osc_add_hook('footer', 'add_close_button_action');
        }
    }

    function theme_revo_actions_admin() {
        if( Params::getParam('file') == 'oc-content/themes/next_revo/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'next_revo');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $footerLink  = Params::getParam('footer_link');
                $defaultLogo = Params::getParam('default_logo');
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'next_revo');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'next_revo');
                osc_set_preference('default_logo', ($defaultLogo ? '1' : '0'), 'next_revo');
				osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'next_revo');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));
                osc_set_preference('revoColor@all', Params::getParam('revoColor@all'), 'next_revo');
				osc_set_preference('inc-main-cat',      trim(Params::getParam('inc-main-cat', false, false, false)),              'next_revo');
				osc_set_preference('main-search',      trim(Params::getParam('main-search', false, false, false)),              'next_revo');
                osc_set_preference('main-slider',      trim(Params::getParam('main-slider', false, false, false)),              'next_revo');
				osc_set_preference('main-slider-tip',      trim(Params::getParam('main-slider-tip', false, false, false)),              'next_revo');
				osc_set_preference('main-carousel',      trim(Params::getParam('main-carousel', false, false, false)),              'next_revo');
				osc_set_preference('main-carousel-tip',      trim(Params::getParam('main-carousel-tip', false, false, false)),              'next_revo');
				osc_set_preference('main-regcity',      trim(Params::getParam('main-regcity', false, false, false)),              'next_revo');
				osc_add_flash_ok_message(__('Theme settings updated correctly', 'next_revo'), 'admin');
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/settings.php')); exit;
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                        osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'next_revo'), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again", 'next_revo'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'next_revo'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/header.php')); exit;
            break;
            case('remove'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    @unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" );
                    osc_add_flash_ok_message(__('The logo image has been removed', 'next_revo'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'next_revo'), 'admin');
                }
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/header.php')); exit;
            break;
			 case('social_revo'):
			 osc_set_preference('facebook-nextrevo',         trim(Params::getParam('facebook-nextrevo', false, false, false)),                  'next_revo');
				osc_set_preference('twitter-nextrevo',         trim(Params::getParam('twitter-nextrevo', false, false, false)),                  'next_revo');
				osc_set_preference('google-nextrevo',         trim(Params::getParam('google-nextrevo', false, false, false)),                  'next_revo');
		       osc_add_flash_ok_message(__("Settings updated correctly", 'next_revo'), 'admin');
				osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/next_revo/admin/settings.php#social' ));
			break;
			case('ads_revo'):
                osc_set_preference('main-nextrevo-top',         trim(Params::getParam('main-nextrevo-top', false, false, false)),                  'next_revo');
                osc_set_preference('main-nextrevo-under',       trim(Params::getParam('main-nextrevo-under', false, false, false)),                'next_revo');
                osc_set_preference('main-nextrevo-middle',       trim(Params::getParam('main-nextrevo-middle', false, false, false)),                'next_revo');
                osc_set_preference('search-nextrevo-top',     trim(Params::getParam('search-nextrevo-top', false, false, false)),          'next_revo');
                osc_set_preference('search-nextrevo_middle',  trim(Params::getParam('search-nextrevo_middle', false, false, false)),       'next_revo');
				osc_set_preference('search-nextrevo_under',  trim(Params::getParam('search-nextrevo_under', false, false, false)),       'next_revo');
				osc_set_preference('item-nextrevo_desc',  trim(Params::getParam('item-nextrevo_desc', false, false, false)),       'next_revo');
				osc_set_preference('item-nextrevo_image',  trim(Params::getParam('item-nextrevo_image', false, false, false)),       'next_revo');
				osc_set_preference('header-nextrevo',         trim(Params::getParam('header-nextrevo', false, false, false)),                  'next_revo');
				osc_set_preference('search-middle',  trim(Params::getParam('search-middle', false, false, false)),       'next_revo');
				osc_set_preference('main-middle',  trim(Params::getParam('main-middle', false, false, false)),       'next_revo');
                 osc_add_flash_ok_message(__("Settings updated correctly", 'next_revo'), 'admin');
				osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/next_revo/admin/settings.php#ads' ));
			break;
			case('related_revo'):
		        osc_set_preference('related_next_ra_numads', Params::getParam('related_next_ra_numads'), 'next_revo');
	            osc_set_preference('related_next_ra_category', Params::getParam('related_next_ra_category'), 'next_revo');
				osc_set_preference('related_next_premiumonly', Params::getParam('related_next_premiumonly'), 'next_revo');
				osc_set_preference('related_next_picOnly', Params::getParam('related_next_picOnly'), 'next_revo');
				osc_set_preference('related_next_ra_country', Params::getParam('related_next_ra_country'), 'next_revo');
				osc_set_preference('related_next_ra_region', Params::getParam('related_next_ra_region'), 'next_revo');
				osc_add_flash_ok_message(__("Ads management updated correctly", 'next_revo'), 'admin');
				osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/next_revo/admin/settings.php#related' ));
				break;
			
        }
    }
	osc_add_hook('init_admin', 'theme_revo_actions_admin');

	
	if( !function_exists('next_show_as') ){
        function next_show_as(){

            $p_sShowAs    = Params::getParam('sShowAs');
            $aValidShowAsValues = array('list', 'gallery');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = next_default_show_as();
            }

            return $p_sShowAs;
        }
    }
	if( !function_exists('revo_catshow_as') ){
        function revo_catshow_as(){

            $p_sShowAs    = Params::getParam('inc-main-cat');
            $aValidShowAsValues = array('inc.main.category', 'inc.main');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = revo_category_main();
            }

            return $p_sShowAs;
        }
    }
	if( !function_exists('revo_category_main') ){
        function revo_category_main(){
            return getPreference('inc-main-cat','next_revo');
        }
    }
    if( !function_exists('next_default_show_as') ){
        function next_default_show_as(){
            return getPreference('defaultShowAs@all','next_revo');
        }
    }
	if( !function_exists('revo_color') ){
        function revo_color(){
            return getPreference('revoColor@all','next_revo');
        }
    }
	if( !function_exists('revo_regioncity_main') ){
        function revo_regioncity_main(){
            return getPreference('main-search','next_revo');
        }
    }
    
	if( !function_exists('get_categoriesHierarchy') ) {
        function get_categoriesHierarchy( ) {
            $location = Rewrite::newInstance()->get_location() ;
            $section  = Rewrite::newInstance()->get_section() ;
            
            if ( $location != 'search' ) {
                return false ;
            }
            
            $category_id = osc_search_category_id() ;
            
            if(count($category_id) > 1) {
                return false;
            }
            
            $category_id = (int) $category_id[0] ;
            
            $categoriesHierarchy = Category::newInstance()->hierarchy($category_id) ;
            
            foreach($categoriesHierarchy as &$category) {
                $category['url'] = get_category_url($category) ;
            }
            
            return $categoriesHierarchy ;
         }
     }
     
     if( !function_exists('get_subcategories') ) {
         function get_subcategories( ) {
             $location = Rewrite::newInstance()->get_location() ;
             $section  = Rewrite::newInstance()->get_section() ;
            
             if ( $location != 'search' ) {
                 return false ;
             }
            
             $category_id = osc_search_category_id() ;
            
             if(count($category_id) > 1) {
                 return false ;
             }
            
             $category_id = (int) $category_id[0] ;
            
             $subCategories = Category::newInstance()->findSubcategories($category_id) ;
            
             foreach($subCategories as &$category) {
                 $category['url'] = get_category_url($category) ;
             }
            
             return $subCategories ;
         }
     }

     if ( !function_exists('get_category_url') ) {
         function get_category_url( $category ) {
             $path = '';
             if ( osc_rewrite_enabled() ) {
                if ($category != '') {
                    $category = Category::newInstance()->hierarchy($category['pk_i_id']) ;
                    $sanitized_category = "" ;
                    for ($i = count($category); $i > 0; $i--) {
                        $sanitized_category .= $category[$i - 1]['s_slug'] . '/' ;
                    }
                    $path = osc_base_url() . $sanitized_category ;
                }
            } else {
                $path = sprintf( osc_base_url(true) . '?page=search&sCategory=%d', $category['pk_i_id'] ) ;
            }
            
            return $path;
         }
     }
     
     if ( !function_exists('get_category_num_items') ) {
         function get_category_num_items( $category ) {
            $category_stats = CategoryStats::newInstance()->countItemsFromCategory($category['pk_i_id']) ;
            
            if( empty($category_stats) ) {
                return 0 ;
            }
            
            return $category_stats;
         }
     }
	 if( !function_exists('next_item_title') ) {
        function next_item_title() {
            $title = osc_item_title();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('title') != "" ) {
                    $title_ = Session::newInstance()->_getForm('title');
                    if( @$title_[$locale['pk_c_code']] != "" ){
                        $title = $title_[$locale['pk_c_code']];
                    }
                }
            }
            return $title;
        }
    }
    if( !function_exists('next_item_description') ) {
        function next_item_description() {
            $description = osc_item_description();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('description') != "" ) {
                    $description_ = Session::newInstance()->_getForm('description');
                    if( @$description_[$locale['pk_c_code']] != "" ){
                        $description = $description_[$locale['pk_c_code']];
                    }
                }
            }
            return $description;
        }
    }
	
	    if( !function_exists('next_item_canal') ) {
        function next_item_canal() {
            $canal = osc_item_canal();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('canal') != "" ) {
                    $canal_ = Session::newInstance()->_getForm('canal');
                    if( @$canal_[$locale['pk_c_code']] != "" ){
                        $canal = $canal_[$locale['pk_c_code']];
                    }
                }
            }
            return $canal;
        }
    }

    if( !function_exists('logo_header') ) {
        function logo_header() {
            $html = '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/logo.jpg') . '" />';
            if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                return $html;
            } else if( osc_get_preference('default_logo', 'next_revo') && (file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/default-logo.jpg")) ) {
                return '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/default-logo.jpg') . '" />';
            } else {
                return osc_page_title();
            }
        }
    }
	if( !function_exists('revo_slider_as') ){
        function revo_slider_as(){

            $p_sShowAs    = Params::getParam('main-slider-tip');
            $aValidShowAsValues = array('premium', 'popular', 'hide');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = revo_main_slider_tip();
            }

            return $p_sShowAs;
        }
		}
	if( !function_exists('revo_main_slider_tip') ) {
		function revo_main_slider_tip() {
			return(osc_get_preference('main-slider-tip', 'next_revo')) ;
		}
	}
	if( !function_exists('revo_carousel_as') ){
        function revo_carousel_as(){

            $p_sShowAs    = Params::getParam('main-carousel-tip');
            $aValidShowAsValues = array('premium', 'popular', 'hide');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = revo_main_carousel_tip();
            }

            return $p_sShowAs;
        }
		}
	if( !function_exists('revo_main_carousel_tip') ) {
		function revo_main_carousel_tip() {
			return(osc_get_preference('main-carousel-tip', 'next_revo')) ;
		}
	}
	if( !function_exists('revo_main_slider_num_ads') ) {
		function revo_main_slider_num_ads() {
			return(osc_get_preference('main-slider', 'next_revo')) ;
		}
	}
	if( !function_exists('revo_main_carousel_num_ads') ) {
		function revo_main_carousel_num_ads() {
			return(osc_get_preference('main-carousel', 'next_revo')) ;
		}
	}

    // install update options
    if( !function_exists('next_theme_install') ) {
        function next_theme_install() {
            osc_set_preference('keyword_placeholder', __('ie. car', 'next_revo'), 'next_revo');
            osc_set_preference('version', '3.2.2', 'next_revo');
            osc_set_preference('footer_link', true, 'next_revo');
            osc_set_preference('donation', '0', 'next_revo');
            osc_set_preference('default_logo', '1', 'next_revo');
			osc_set_preference('related_next_ra_numads', '4','next_revo');
			osc_set_preference('main-slider', '8','next_revo');
			osc_set_preference('main-slider-tip', 'premium','next_revo');
			osc_set_preference('main-carousel', '8','next_revo');
			osc_set_preference('main-carousel-tip', 'popular','next_revo');
			osc_set_preference('defaultShowAs@all', 'gallery', 'next_revo');
			osc_set_preference('revoColor@all', 'blue', 'next_revo');
			osc_set_preference('main-search', 'inc.search', 'next_revo');
			osc_set_preference('inc-main-cat', 'inc.main', 'next_revo');
			osc_set_preference('main-regcity', 'regions', 'next_revo');
			osc_set_preference('search-middle', '5', 'next_revo');
			osc_set_preference('main-middle', '5', 'next_revo');
            osc_reset_preferences();
        }
    }

    if(!function_exists('check_install_next_theme')) {
        function check_install_next_theme() {
            $current_version = osc_get_preference('version', 'next_revo');
            //check if current version is installed or need an update
            if( !$current_version ) {
                next_theme_install();
            }
        }
    }

    require_once WebThemes::newInstance()->getCurrentThemePath() . 'inc.functions.php';

    check_install_next_theme();
	/* ads  SEARCH */
    function search_ads_listing_top_nextrevo() {
        if(osc_get_preference('search-nextrevo-top', 'next_revo')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="search_top">' . PHP_EOL;
            echo osc_get_preference('search-nextrevo-top', 'next_revo');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('search_top', 'search_ads_listing_top_nextrevo');
	
	function search_ads_listing_under_nextrevo() {
        if(osc_get_preference('search-nextrevo_under', 'next_revo')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="search_under">' . PHP_EOL;
            echo osc_get_preference('search-nextrevo_under', 'next_revo');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('search_under', 'search_ads_listing_under_nextrevo');

    function main_ads_listing_medium_nextrevo() {
        if(osc_get_preference('main-nextrevo-middle', 'next_revo')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="middle_main">' . PHP_EOL;
            echo osc_get_preference('main-nextrevo-middle', 'next_revo');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('main_middle', 'main_ads_listing_medium_nextrevo');
	
	function search_ads_listing_medium_nextrevo() {
        if(osc_get_preference('search-nextrevo_middle', 'next_revo')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="middle_search">' . PHP_EOL;
            echo osc_get_preference('search-nextrevo_middle', 'next_revo');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('search_middle', 'search_ads_listing_medium_nextrevo');

    /* remove theme */
function revo_delete() {
Preference::newInstance()->delete(array('s_section' => 'next_revo'));
    }

osc_add_hook('theme_delete_next_revo', 'revo_delete');
	
	
function next_popular_ads_start() {

		  $num_ads2 = revo_main_carousel_num_ads(); // SETS HOW MANY POPULAR ADS TO DISPLAY
		  $conn = getConnection();
          $item_array=$conn->osc_dbFetchResults("SELECT i.*, l.*, d.*, total_views
    FROM %st_item i
    JOIN %st_item_location l ON i.pk_i_id = l.fk_i_item_id
    JOIN %st_item_description d ON i.pk_i_id = d.fk_i_item_id
    join (select fk_i_item_id as pk_i_id, sum(i_num_views) as total_views
    from %st_item_stats
    group by fk_i_item_id
    having total_views > 0 ) as aux_item_views on aux_item_views.pk_i_id = i.pk_i_id
    WHERE i.b_enabled = 1 AND i.b_active = 1 AND i.b_spam = 0 AND (i.b_premium = 1 || i.dt_expiration >= CURDATE())
    ORDER BY total_views DESC
    LIMIT 0, %d", DB_TABLE_PREFIX, DB_TABLE_PREFIX, DB_TABLE_PREFIX, DB_TABLE_PREFIX, $num_ads2);

    if(count($item_array) > 0) {
	View::newInstance()->_exportVariableToView('customItems', $item_array);
    } else echo _e('No Results', 'next_revo');
}

    function osc_related_next_ra_numads() {
        return(osc_get_preference('related_next_ra_numads', 'next_revo')) ;
    }
    
    function osc_related_next_category() {
        return(osc_get_preference('related_next_ra_category', 'next_revo')) ;
    }
    
    function osc_related_next_country() {
        return(osc_get_preference('related_next_ra_country', 'next_revo')) ;
    }
    
    function osc_related_next_region() {
        return(osc_get_preference('related_next_ra_region', 'next_revo')) ;
    }
    
    function osc_related_next_picOnly() {
        return(osc_get_preference('related_next_picOnly', 'next_revo')) ;
    }
    
    function osc_related_next_css() {
    	return(osc_get_preference('related_next_css', 'next_revo')) ;
    }
    
    function osc_related_next_autoembed() {
    	return(osc_get_preference('related_next_autoembed', 'next_revo')) ;
    }
    function osc_related_next_premiumOnly() {
    	return(osc_get_preference('related_next_premiumonly', 'next_revo')) ;
    }
	
//function to show related Ads    	 
function related_next_start() {
    $rmItemId = osc_item_id() ;
    $ra_numads = (osc_related_next_ra_numads() != '') ? osc_related_next_ra_numads() : '' ;
    $country = (osc_related_next_country() != '') ? osc_related_next_country() : '' ;
    $region = (osc_related_next_region() != '') ? osc_related_next_region() : '' ;
    $category = (osc_related_next_category() != '') ? osc_related_next_category() : '' ;
    $picOnly = (osc_related_next_picOnly() != '') ? osc_related_next_picOnly() : ''; 
    $premiumonly = (osc_related_next_premiumOnly() != '') ? osc_related_next_premiumOnly() : '';
    
    $mSearch = new Search() ;
    
    //Excluding current item
    $mSearch->dao->where(sprintf("%st_item.pk_i_id <> $rmItemId", DB_TABLE_PREFIX));
    
    //Checking if item is premium
    if($premiumonly ==1){
    $mSearch->dao->where(sprintf("%st_item.b_premium = 1", DB_TABLE_PREFIX));
    }
    
    //Adding Country as condition
    if($country ==1){
    $mSearch->addCountry(osc_item_country()) ;
    }
    
    //Adding Region as condition
    if($region ==1) {
    $mSearch->addRegion(osc_item_region()) ;
    }
    
    //Adding Item Category as condition
    if($category ==1) {
    $mSearch->addCategory(osc_item_category_id()) ;
    }
    
    //Adding condition for item having pictures
    if($picOnly == 1 ) {
    $mSearch->withPicture(true); //Search only Item which have pictures
    }
    
    //limiting number of related ads
    $mSearch->limit(0, $ra_numads) ; // fetch number of ads to show set in preference
    
    //Searching with all enabled conditions
    $aItems = $mSearch->doSearch();
     


	
	$global_items = View::newInstance()->_get('items') ; //save existing item array
	View::newInstance()->_exportVariableToView('items', $aItems); //exporting our searched item array

    require_once WebThemes::newInstance()->getCurrentThemePath() . 'related_next_ads.php';


  
     //calling stored item array
    View::newInstance()->_exportVariableToView('items', $global_items); //restore original item array
    }
  


?>