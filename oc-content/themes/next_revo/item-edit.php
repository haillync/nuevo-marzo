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

   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />

        <!-- only item-edit.php -->
        <?php ItemForm::location_javascript(); ?>
        <?php
        if(osc_images_enabled_at_items() && !next_is_fineuploader()) {
            ItemForm::photos_javascript();
        }
        ?>
        <script type="text/javascript">

     

            function uniform_input_file(){
                photos_div = $('div.photos');
                $('div',photos_div).each(
                    function(){
                        if( $(this).find('div.uploader').length == 0  ){
                            divid = $(this).attr('id');
                            if(divid != 'photos'){
                                divclass = $(this).hasClass('box');
                                if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                                    $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
                                }
                            }
                        }
                    }
                );
            }

          
            <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
            $().ready(function(){
                $("#price").blur(function(event) {
                    var price = $("#price").prop("value");
                    <?php if(osc_locale_thousands_sep()!='') { ?>
                    while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                        price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
                    }
                    <?php }; ?>
                    <?php if(osc_locale_dec_point()!='') { ?>
                    var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
                    if(tmp.length>2) {
                        price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
                    }
                    <?php }; ?>
                    $("#price").prop("value", price);
                });
            });
            <?php }; ?>
        </script>
        <!-- end only item-edit.php -->
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content add_item">
            <h1><strong><?php _e('Update your listing', 'next_revo'); ?></strong></h1>
            <ul id="error_list"></ul>
                <form name="item" action="<?php echo osc_base_url(true)?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="action" value="item_edit_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                    <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                        <div class="box general_info">
                            <h2><?php _e('General Information', 'next_revo'); ?></h2>
                            <div class="row">
                                <label><?php _e('Category', 'next_revo'); ?> *</label>
                                <?php ItemForm::category_multiple_selects(null, null, __('Select a category', 'next_revo')); ?>
                            </div>
                            <div class="row">
                            <label for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('Title', 'next_revo'); ?></label>
                                <?php ItemForm::title_input('title',osc_current_user_locale(), osc_esc_html( next_item_title() )); ?>
                        </div>
                        <div class="row">
                            <label for="description[<?php echo osc_current_user_locale(); ?>]"><?php _e('Description', 'next_revo'); ?></label>
                                <?php ItemForm::description_textarea('description',osc_current_user_locale(),  next_item_description() ); ?>
                        </div>
						<!--<div class="row">
                            <label  for="canal"><?php echo "Link del Canal:"; ?></label>
                                <?php //ItemForm::canal_text('canal',osc_current_user_locale(), osc_esc_html( next_item_canal() )); ?>
                        </div>-->
                            <?php if( osc_price_enabled_at_items() ) { ?>
                            <div class="row price">
                                <label><?php _e('Price', 'next_revo'); ?></label>
                                <?php ItemForm::price_input_text(); ?>
                                <?php ItemForm::currency_select(); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="box photos">
						<?php
                            if(osc_images_enabled_at_items()) {
                                if(next_is_fineuploader()) {
                                    // new ajax photo upload
                                    ItemForm::ajax_photos();
                                }
                            } else { ?>
                            <h2><?php _e('Photos', 'next_revo'); ?></h2>
                            <?php ItemForm::photos(); ?>
                            <div id="photos">
                                <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                <div class="row">
                                    <input type="file" name="photos[]" />
                                </div>
                                <?php }; ?>
                            </div>
                            <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'next_revo'); ?></a>
                        </div>
                      
						<?php
                            }
                        }
                        ?>

                        <div class="box location">
                            <h2><?php _e('Location', 'next_revo'); ?></h2>
                          
                            <div class="row">
                                <label><?php _e('Region', 'next_revo'); ?></label>
                                <?php ItemForm::region_select(osc_get_regions(), osc_user()) ; ?>
                            </div>
                            <div class="row">
                                <label><?php _e('City', 'next_revo'); ?></label>
                                <?php ItemForm::city_select(osc_get_cities(osc_user_region()), osc_user()) ; ?>
                            </div>
                            <div class="row">
                                <label><?php _e('City area', 'next_revo'); ?></label>
                                <?php ItemForm::city_area_text(); ?>
                            </div>
                            <div class="row">
                                <label><?php _e('Address', 'next_revo'); ?></label>
                                <?php ItemForm::address_text(); ?>
                            </div>
                        </div>
                        <?php ItemForm::plugin_edit_item(); ?>
                        <?php if( osc_recaptcha_items_enabled() ) {?>
                        <div class="box">
                            <div class="row">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                        </div>
                        <?php }?>
                    <button class="ui-button" type="submit"><?php _e('Update', 'next_revo'); ?></button>
                    <a href="javascript:history.back(-1)" class="go_back"><?php _e('Cancel', 'next_revo'); ?></a>
                </fieldset>
            </form>
        </div></div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>