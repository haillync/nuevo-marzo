<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
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

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<h2 class="render-title"><b><?php _e('Ads management', 'next_revo'); ?></b></h2>
	<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/next_revo/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="ads_revo" />
    <div class="form-row">
        <div class="form-label"></div>
        <div class="form-controls">
            <p><?php _e('In this section you can configure your site to display ads and start generating revenue.', 'next_revo'); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', 'next_revo'); ?></p>
        </div>
    </div>
    <fieldset>
        <div class="form-horizontal">
		     <div class="form-row">
                <div class="form-label"><?php _e('Header', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="header-nextrevo"><?php echo osc_esc_html( osc_get_preference('header-nextrevo', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the Header of your site in all pages. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage top of  latest listings', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="main-nextrevo-top"><?php echo osc_esc_html( osc_get_preference('main-nextrevo-top', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top of your latest listings in main page. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage under of latest listings', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="main-nextrevo-under"><?php echo osc_esc_html( osc_get_preference('main-nextrevo-under', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the main page under of your latest listings. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage middle of latest listings(only list view).', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="main-nextrevo-middle"><?php echo osc_esc_html( osc_get_preference('main-nextrevo-middle', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the main page middle of your latest listings. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('No. of item after Show - Homepage middle:', 'next_revo'); ?></b></div>
                <div class="form-controls">
					<input type="text" class="input-small" name="main-middle" value="<?php echo osc_get_preference('main-middle', 'next_revo'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results top', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-nextrevo-top"><?php echo osc_esc_html( osc_get_preference('search-nextrevo-top', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top search results of your site. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results middle(only list view).', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-nextrevo_middle"><?php echo osc_esc_html( osc_get_preference('search-nextrevo_middle', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at middle of search results of your website. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><b><?php _e('No. of item after Show - Search results middle:', 'next_revo'); ?></b></div>
                <div class="form-controls">
					<input type="text" class="input-small" name="search-middle" value="<?php echo osc_get_preference('search-middle', 'next_revo'); ?>" />
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Search under of listings', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-nextrevo_under"><?php echo osc_esc_html( osc_get_preference('search-nextrevo_under', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the search page under of your listings. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Item under of listing description', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="item-nextrevo_desc"><?php echo osc_esc_html( osc_get_preference('item-nextrevo_desc', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the item page under of listing description. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e('Item left of listing images', 'next_revo'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="item-nextrevo_image"><?php echo osc_esc_html( osc_get_preference('item-nextrevo_image', 'next_revo') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the item page left of listing images. Note that the  ad will be Adaptive.', 'next_revo'); ?></div>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'next_revo'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>
