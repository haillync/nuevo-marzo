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

    $locales   = __get('locales');
    $user = osc_user();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content user_account">
            <h1>
                <strong><?php _e('User account manager', 'next_revo'); ?></strong>
            </h1>
            <div id="sidebar">
                <?php echo osc_private_user_menu(); ?>
            </div>
            <div id="main" class="modify_profile">
                <h2><?php _e('Update your profile', 'next_revo'); ?></h2>
                <?php UserForm::location_javascript(); ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#delete_account").click(function(){
                            $("#dialog-delete-account").dialog('open');
                        });

                        $("#dialog-delete-account").dialog({
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                "<?php echo osc_esc_js(__('Delete', 'next_revo')); ?>": function() {
                                    window.location = '<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>';
                                },
                                "<?php echo osc_esc_js(__('Cancel', 'next_revo')); ?>": function() {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                </script>
                <form action="<?php echo osc_base_url(true); ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="action" value="profile_post" />
                    <fieldset>
                        <div class="row">
                            <label for="name"><?php _e('Name', 'next_revo'); ?></label>
                            <?php UserForm::name_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="email"><?php _e('Username', 'next_revo'); ?></label>
                            <span class="update">
                                <?php echo osc_user_username(); ?><br />
                                <?php if(osc_user_username()==osc_user_id()) { ?>
                                    <a href="<?php echo osc_change_user_username_url(); ?>"><?php _e('Modify username', 'next_revo'); ?></a>
                                <?php }; ?>
                            </span>
                        </div>
                        <div class="row">
                            <label for="email"><?php _e('E-mail', 'next_revo'); ?></label>
                            <span class="update">
                                <?php echo osc_user_email(); ?><br />
                                <a href="<?php echo osc_change_user_email_url(); ?>"><?php _e('Modify e-mail', 'next_revo'); ?></a> <a href="<?php echo osc_change_user_password_url(); ?>" ><?php _e('Modify password', 'next_revo'); ?></a>
                            </span>
                        </div>
                        <div class="row">
                            <label for="user_type"><?php _e('User type', 'next_revo'); ?></label>
                            <?php UserForm::is_company_select(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="phoneMobile"><?php _e('Cell phone', 'next_revo'); ?></label>
                            <?php UserForm::mobile_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="phoneLand"><?php _e('Phone', 'next_revo'); ?></label>
                            <?php UserForm::phone_land_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="country"><?php _e('Country', 'next_revo'); ?> *</label>
                            <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="region"><?php _e('Region', 'next_revo'); ?> *</label>
                            <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city"><?php _e('City', 'next_revo'); ?> *</label>
                            <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city_area"><?php _e('City area', 'next_revo'); ?></label>
                            <?php UserForm::city_area_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="address"><?php _e('Address', 'next_revo'); ?></label>
                            <?php UserForm::address_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="webSite"><?php _e('Website', 'next_revo'); ?></label>
                            <?php UserForm::website_text(osc_user()); ?>
                        </div>
                        <div class="row">
						<label for="desc"><?php _e('User Description', 'next_revo'); ?></label>
                            <?php UserForm::info_textarea('s_info', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info']); ?>
                        </div>
                        <div class="row">
                            <button type="submit" class="ui-button"><?php _e('Update', 'next_revo'); ?></button>
                            <button id="delete_account" type="button"><?php _e('Delete my account', 'next_revo'); ?></button>
                        </div>
                        <?php osc_run_hook('user_form'); ?>
                    </fieldset>
                </form>
            </div>
        </div>
        <div id="dialog-delete-account" title="<?php _e('Delete account', 'next_revo'); ?>" class="has-form-actions hide">
            <div class="form-horizontal">
                <div class="form-row">
                    <p><?php _e('All your listings and alerts will be removed, this action can not be undone.', 'next_revo');?></p>
                </div>
            </div>
        </div></div><div style="clear:both"></div>	
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>