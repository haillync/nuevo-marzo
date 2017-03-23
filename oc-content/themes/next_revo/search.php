<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
	 $codigo= $_REQUEST['sCountry'];
	 $region= $_REQUEST['sRegion'];
	 $category=$_REQUEST['sCategory'];
	 $city= $_REQUEST['sCity'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <?php if( osc_count_items() == 0 || Params::getParam('iPage') > 0 || stripos($_SERVER['REQUEST_URI'], 'search') )  { ?>
            <meta name="robots" content="noindex, nofollow" />
            <meta name="googlebot" content="noindex, nofollow" />
        <?php } else { ?>
            <meta name="robots" content="index, follow" />
            <meta name="googlebot" content="index, follow" />
        <?php } ?>
            <style>
                ul.sub {
                    padding-left: 20px;
                }
                .chbx{
                    width:15px; height:15px;
                    display: inline;
                    padding:8px 3px;
                    background-repeat:no-repeat;
                    cursor: pointer;
                }
                .chbx span{
                    width:13px; height:13px;
                    display: inline-block;
                    border:solid 1px #bababa;
                    border-radius:2px;
                    -moz-border-radius:2px;
                    -webkit-border-radius:2px;
                }
                .chbx.checked{
                    background-image:url('<?php echo osc_current_web_theme_url('images/checkmark.png'); ?>');
                }
                .chbx.semi-checked{
                    background-image:url('<?php echo osc_current_web_theme_url('images/checkmark-partial.png'); ?>');
                }
            </style>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('li.parent').each(function() {
                        var totalInputSub = $(this).find('ul.sub>li>input').size();
                        var totalInputSubChecked = $(this).find('ul.sub>li>input:checked').size();
                        $(this).find('ul.sub>li>input').each(function(){
                            $(this).hide();
                            var id = $(this).attr('id');
                            id = id+'_';
                            if( $(this).is(':checked') ){
                                var aux = $('<div class="chbx checked"><span></span></div>').attr('id', id);
                                $(this).before(aux);
                            } else {
                                var aux = $('<div class="chbx"><span></span></div>').attr('id', id);
                                $(this).before(aux);
                            }
                        });

                        var input = $(this).find('input.parent');
                        $(input).hide();
                        var id = $(input).attr('id');
                        id = id+'_';
                        if(totalInputSub == totalInputSubChecked) {
                            if(totalInputSub == 0) {
                                if( $(this).find("input[name='sCategory[]']:checked").size() > 0) {
                                    var aux = $('<div class="chbx checked"><span></span></div>').attr('id', id);
                                    $(input).before(aux);
                                } else {
                                    var aux = $('<div class="chbx"><span></span></div>').attr('id', id);
                                    $(input).before(aux);
                                }
                            } else {
                                var aux = $('<div class="chbx checked"><span></span></div>').attr('id', id);
                                $(input).before(aux);
                            }
                        }else if(totalInputSubChecked == 0) {
                            // no input checked
                            var aux = $('<div class="chbx"><span></span></div>').attr('id', id);
                            $(input).before(aux);
                        }else if(totalInputSubChecked < totalInputSub) {
                            var aux = $('<div class="chbx semi-checked"><span></span></div>').attr('id', id);
                            $(input).before(aux);
                        }
                    });

                    $('li.parent').prepend('<span style="width:6px;display:inline-block;" class="toggle">+</span>');
                    $('ul.sub').toggle();

                    $('span.toggle').click(function(){
                        $(this).parent().find('ul.sub').toggle();
                        if($(this).text()=='+'){
                            $(this).html('-');
                        } else {
                            $(this).html('+');
                        }
                    });

                    $("li input[name='sCategory[]']").change( function(){
                        var id = $(this).attr('id');
                        $(this).click();
                        $('#'+id+'_').click();
                    });

                    $('div.chbx').click( function() {
                        var isChecked       = $(this).hasClass('checked');
                        var isSemiChecked   = $(this).hasClass('semi-checked');

                        if(isChecked) {
                            $(this).removeClass('checked');
                            $(this).next('input').prop('checked', false);
                        } else if(isSemiChecked) {
                            $(this).removeClass('semi-checked');
                            $(this).next('input').prop('checked', false);
                        } else {
                            $(this).addClass('checked');
                            $(this).next('input').prop('checked', true);
                        }

                        // there are subcategories ?
                        if($(this).parent().find('ul.sub').size()>0) {
                            if(isChecked){
                                $(this).parent().find('ul.sub>li>div.chbx').removeClass('checked');
                                $(this).parent().find('ul.sub>li>input').prop('checked', false);
                            } else if(isSemiChecked){
                                // if semi-checked -> check-all
                                $(this).parent().find('ul.sub>li>div.chbx').removeClass('checked');
                                $(this).parent().find('ul.sub>li>input').prop('checked', false);
                                $(this).removeClass('semi-checked');
                            } else {
                                $(this).parent().find('ul.sub>li>div.chbx').addClass('checked');
                                $(this).parent().find('ul.sub>li>input').prop('checked', true);
                            }
                        } else {
                            // is subcategory checkbox or is category parent without subcategories
                            var parentLi = $(this).closest('li.parent');

                            // subcategory
                            if($(parentLi).find('ul.sub').size() > 0) {
                                var totalInputSub           = $(parentLi).find('ul.sub>li>input').size();
                                var totalInputSubChecked    = $(parentLi).find('ul.sub>li>input:checked').size();

                                var input    = $(parentLi).find('input.parent');
                                var divInput = $(parentLi).find('div.chbx').first();

                                $(input).prop('checked', false);
                                $(divInput).removeClass('checked');
                                $(divInput).removeClass('semi-checked');

                                if(totalInputSub == totalInputSubChecked) {
                                    $(divInput).addClass('checked');
                                    $(input).prop('checked', true);
                                }else if(totalInputSubChecked == 0) {
                                    // no input checked;
                                }else if(totalInputSubChecked < totalInputSub) {
                                    $(divInput).addClass('semi-checked');
                                }
                            } else {
                                // parent category
                            }
                        }
                    });
                });
            </script>
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content list">
            <div id="main">
			<?php  if ( osc_is_search_page() ) { ?>
	<?php $spubcat = get_categoriesHierarchy(); ?>
 	<?php if (!isset($spubcat[2]) && !isset($spubcat[1]) && isset($spubcat[0])){ ?>
                    		<?php ;
                    		 echo '<ul class="subcat">';
							
                    		 foreach(get_subcategories() as $subcat) {
					
					echo "<li class=\"1\"><a href='".$subcat["url"]."'>".$subcat["s_name"]." <span class=\"views\">" . get_category_num_items($subcat) . "</span></a> </li>";
				 }
				 
				 echo '</ul>';
                    		 } 
				elseif (!isset($spubcat[2]) && isset($spubcat[1]) && isset($spubcat[0])) { ?>
				<?php ; 
                    		echo '<ul class="subcat">';
						
                    		 foreach(get_subcategories() as $subcat) {
					
					echo "<li class=\"1\"><a href='".$subcat["url"]."'>".$subcat["s_name"]."</a></li> (" . get_category_num_items($subcat) . ")";
				 }
				
				 echo '</ul>';
                    		}			 
                    	else { ?>
                    	<?php } ?>
						<?php 
		$myreg_id = '';
		if( osc_search_region() != '' ) {
         echo '<ul class="subcat">';
		$v_reg_id  = Region::newInstance()->findByName(osc_search_region());
		if(isset($v_reg_id['pk_i_id'])) {
			$myreg_id = $v_reg_id['pk_i_id'];
			}
			while(osc_has_list_cities($myreg_id) ) { ?>
        <li class="1"><a href="<?php echo osc_search_url( array( 'sCity' => osc_list_city_name() ) ) ; ?>"><?php echo osc_list_city_name() ; ?><span class="views"><?php echo osc_list_city_items() ; ?></span></a></li>
		<?php } ?>
		</ul>

		<?php } ?><?php } ?>
		
                <div class="ad_list">
                    <div id="list_head">
                        <div class="inner">
                            <h1>
                                <strong><?php echo search_title(); ?></strong>
                            </h1>
                            <p class="see_by">
                               <?php _e('Sort by', 'next_revo'); ?>:
                                <?php $i = 0; ?>
                                <?php $orders = osc_list_orders();
                                foreach($orders as $label => $params) {
                                    $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                    <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                        <a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a>
                                    <?php } else { ?>
                                        <a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a>
                                    <?php } ?>
                                    <?php if ($i != count($orders)-1) { ?>
                                        <span>|</span>
                                    <?php } ?>
                                    <?php $i++; ?>
                                <?php } ?>

                            </p>
							<div class="inner">
							<p class="see_by">
								<?php $params['sShowAs'] = 'gallery'; ?><a href="<?php echo osc_update_search_url($params) ; ?>"><i class="fa fa-th fa-2x"></i></a>
      &nbsp;<?php $params['sShowAs'] = 'list'; ?><a href="<?php echo osc_update_search_url($params) ; ?>"><i class="fa fa-th-list fa-2x"></i></a>
							</p></div>
							<div style="text-align:right">   
      
      </div>
                        </div>
                    </div>
					<div class="clear"></div>
                    <?php if(osc_count_items() == 0) { ?>
                        <p class="empty" ><?php printf(__('There are no results matching "%s"', 'next_revo'), osc_search_pattern()); ?></p>
                    <?php } else { ?>
					   <?php osc_run_hook('search_top'); ?>
                        <?php require(osc_search_show_as() == 'list' ? 'search_list.php' : 'search_gallery.php'); ?>
						<?php osc_run_hook('search_under'); ?>
                        <div class="paginate" >
                        <?php echo osc_search_pagination(); ?>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                    <?php $footerLinks = osc_search_footer_links(); ?>
                    <ul class="footer-links">
                    <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
                        <?php if($f['total'] < 3) continue; ?>
                        <li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
                    <?php } ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="sidebar">
                <div class="filters">
                    <form action="<?php echo osc_base_url(true); ?>" method="get" onsubmit="return doSearch()" class="nocsrf">
                        <input type="hidden" name="page" value="search" />
                        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
                        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting(); echo osc_esc_html($allowedTypesForSorting[osc_search_order_type()]); ?>" />
                        <?php foreach(osc_search_user() as $userId) { ?>
                            <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
                        <?php } ?>
                        <fieldset class="box location">
						    <div class="row_next">
                            <h3><strong><?php _e('Your search', 'next_revo'); ?></strong></h3></div>
                            <div class="row one_input">
                                <input type="text" name="sPattern" id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" />
                                <div id="search-example"></div>
                            </div>
							<div class="row_next">
                            <h3><strong><?php _e('Location', 'next_revo'); ?></strong></h3></div>
                            <div class="row one_input">
								<?php if ($codigo!=""){?>
								  <ul>
								   <?php View::newInstance()->_exportVariableToView('list_regions', RegionStats::newInstance()->listRegions($codigo) );
									if(osc_count_list_regions() > 0 ) { ?>
									<ul>
									<?php while(osc_has_list_regions() ) { ?>
										 <li><a href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_id(), 'sCategory' => $category) )  ; ?>"><?php echo osc_list_region_name() ; ?>(<?php echo osc_list_region_items(); ?>)</a></li>
									<?php } ?>
									</ul>
        
								<?php }  ?>
									</ul>
                                <?php } elseif ($region!=''){?>
										<ul>
										  <?php View::newInstance()->_exportVariableToView('list_cities', CityStats::newInstance()->listCities($region) );?>
										 <?php  ?>
												   
												  
											<?php if(osc_count_list_cities() > 0 ) { ?>
															<?php while(osc_has_list_cities() ) { ?>
																<li><a href="<?php echo osc_search_url( array( 'sCity' => osc_list_city_id(), 'sCategory' => $category ) ) ; ?>"><?php echo osc_list_city_name() ; ?><em>(<?php echo osc_list_city_items() ; ?>)</em></a></li>
															<?php } ?>
										  </ul>
											<?php } ?>
											<h3><?php echo "Refinar Ubicacion" ; ?></h3>
											<?php 
											$Pkcountry= Region::newInstance()-> findcountryByPrimaryKey($region);
											 
													$country= Country::newInstance()->findByCode($Pkcountry);
													$pais= $country['s_name'];?>
												<li><a href="<?php echo osc_search_url(array('sCountry' => $Pkcountry, 'sCategory' => $category)); ?>"><strong><?php echo "Pais: ".$pais ; ?></strong></a></li>
												
					<?php } elseif ($city!=''){?>
					<?php  $Pkregion= City::newInstance()->findregionByPrimaryKey($city);
						
						$region= Region::newInstance()->findByPK($Pkregion);
						$provincia= $region['s_name'];?>
					<li><a href="<?php echo osc_search_url(array('sRegion' => $Pkregion, 'sCategory' => $category)); ?>"><strong><?php echo $provincia ; ?></strong></a></li>
                                <input type="hidden" id="sRegion" name="sRegion" value="" />
					<?php }  ?>
                            </div>
                        </fieldset>

                        <!--<fieldset class="box show_only">
                            <?php if( osc_images_enabled_at_items() ) { ?>
							<div class="row_next">
                            <h3><strong><?php _e('Show only', 'next_revo'); ?></strong></h3></div>
                            <div class="row checkboxes">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
                                        <label for="withPicture"><?php _e('Show only listings with pictures', 'next_revo'); ?></label>
                                    </li>
                                </ul>
                            </div>
                            <?php } ?>
                            <?php if( osc_price_enabled_at_items() ) { ?>
                            <div class="row two_input">
                                <h6><?php _e('Price', 'next_revo'); ?></h6>
                                <div><?php _e('Min', 'next_revo'); ?>.</div>
                                <input type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
                                <div><?php _e('Max', 'next_revo'); ?>.</div>
                                <input type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
                            </div>
                            <?php } ?>
                            <?php  osc_get_non_empty_categories(); ?>
                            <?php  if ( osc_count_categories() ) { ?>
                                <div class="row checkboxes">
                                    <h6><?php _e('Category', 'next_revo'); ?></h6>
                                    <ul>
                                        <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                                        <?php osc_goto_first_category(); ?>
                                        <?php while(osc_has_categories()) { ?>
                                            <li class="parent">
                                                <input class="parent" type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>" <?php $parentSelected=false; if (in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){ echo 'checked="checked"'; $parentSelected=true;} ?> /> <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                                                <?php if(osc_count_subcategories() > 0) { ?>
                                                <ul class="sub">
                                                    <?php while(osc_has_subcategories()) { ?>
                                                    <li>
                                                    <input type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>"  <?php if( $parentSelected || in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){echo 'checked="checked"';} ?> />
                                                    <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </fieldset>-->
                        <?php
                            if(osc_search_category_id()) {
                                osc_run_hook('search_form', osc_search_category_id());
                            } else {
                                osc_run_hook('search_form');
                            }
                        ?>
                        <button type="submit" class="ui-button"><i class="fa fa-search"></i>&nbsp;<?php _e('Search', 'next_revo'); ?></button>
                    </form>
                    <?php osc_alert_form(); ?>
                </div>
            </div>
            <script type="text/javascript">
                $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php _e('Selected', 'next_revo'); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php _e('Nothing selected, input was', 'next_revo'); ?> " + this.value );
                        }
                    });
                });

                function checkEmptyCategories() {
                    var n = $("input[id*=cat]:checked").length;
                    if(n>0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </div></div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>
