<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<?php

osc_add_hook('init_admin', 'theme_next_actions_admin');
function next_is_fineuploader() {
    return Scripts::newInstance()->registered['jquery-fineuploader'] && method_exists('ItemForm', 'ajax_photos');
}
if (function_exists('osc_admin_menu_appearance')) {
    osc_admin_menu_appearance(__('Header logo', 'next'), osc_admin_render_theme_url('oc-content/themes/next_revo/admin/header.php'), 'header_next');
    osc_admin_menu_appearance(__('Theme settings', 'next'), osc_admin_render_theme_url('oc-content/themes/next_revo/admin/settings.php'), 'settings_next');
} else {

    function next_admin_menu() {
        echo '<h3><a href="#">' . __('Next Revo theme', 'next_revo') . '</a></h3>
            <ul>
                <li><a href="' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/header.php') . '">&raquo; ' . __('Header logo', 'next_revo') . '</a></li>
                <li><a href="' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/settings.php') . '">&raquo; ' . __('Theme settings', 'next_revo') . '</a></li>
                <li><a href="' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/related.php') . '">&raquo; ' . __('Related Ads', 'next_revo') . '</a></li>
              <li><a href="' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/help.php') . '">&raquo; ' . __('Help', 'next_revo') . '</a></li>
		   </ul>';
    }

    osc_add_hook('admin_menu', 'next_admin_menu');
}

?>