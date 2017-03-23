<?php
/*
Plugin Name: Video Embed Plugin
Plugin URI: http://www.drizzlethemes.com/
Description: Video embed plugin extends listing with embedded videos such as YouTube, Vimeo and Dailymotion via URLs.
Version: 1.5.2
Author: DrizzleThemes
Author URI: http://www.drizzlethemes.com/
Short Name: video_embed_plugin
Plugin update URI: video-embed-plugin
*/

require_once 'ModelVideo.php';

function video_call_after_install() {
	// Insert here the code you want to execute after the plugin's install
    // for example you might want to create a table or modify some values
	
	// In this case we'll create a table to store the Example attributes
    ModelVideo::newInstance()->import('video_embed_plugin/struct.sql');
 		
	osc_set_preference('dd_remove_hook', 'false', 'video_embed_plugin', 'STRING'); 
}

function video_call_after_uninstall() {
	// Insert here the code you want to execute after the plugin's uninstall
    // for example you might want to drop/remove a table or modify some values
	
    // In this case we'll remove the table we created to store Example attributes
    ModelVideo::newInstance()->uninstall();
	
	osc_delete_preference('dd_remove_hook', 'video_embed_plugin');   
}

function video_embed_actions() {
  $dao_preference = new Preference();
  $option = Params::getParam('videooption');

  if (Params::getParam('file') != 'video_embed_plugin/admin/settings.php') {
    return '';
  }

  if ($option == 'videosettings') {
   
    osc_set_preference('dd_remove_hook', Params::getParam("dd_remove_hook") ? Params::getParam("dd_remove_hook") : '0', 'video_embed_plugin', 'STRING');


    osc_add_flash_ok_message(__('Plugin has been updated', 'video_embed_plugin'), 'admin');
    osc_redirect_to(osc_admin_render_plugin_url('video_embed_plugin/admin/settings.php'));
  }
}

function dd_remove_hook() {
  return(osc_get_preference('dd_remove_hook', 'video_embed_plugin'));
}

function dd_remove_post_hook() {
  return(osc_get_preference('dd_remove_post_hook', 'video_embed_plugin'));
}

function video_form($catId = '') {
    // We received the categoryID
    if($catId!=null) {
        // We check if the category is the same as our plugin
        if(osc_is_this_category('video_embed_plugin', $catId)) {
            include_once 'item_edit.php';
        }
    }
	Session::newInstance()->_clearVariables();
}


function video_form_post($item) {
	$catId = isset($item['fk_i_category_id'])?$item['fk_i_category_id']:null;
	$item_id = isset($item['pk_i_id'])?$item['pk_i_id']:null;
	if($catId!="") {
    	// We check if the category is the same as our plugin
		if(osc_is_this_category('video_embed_plugin', $catId) && $item_id!=null) {
			// Insert the data in our plugin's table
			ModelVideo::newInstance()->insertAttr( $item_id, Params::getParam('video') );
		}
	}
}

// Self-explanatory
function video_item_detail() {
    if(osc_is_this_category('video_embed_plugin', osc_item_category_id())) {
        $detail = ModelVideo::newInstance()->getAttrByItemId( osc_item_id() );
        if(isset($detail['fk_i_item_id'])) {
            include_once 'item_detail.php';
        }
    }
}

// Self-explanatory
function video_item_edit($catId = null, $item_id = null) {
    if(osc_is_this_category('video_embed_plugin', $catId)) {
        $detail = ModelVideo::newInstance()->getAttrByItemId( $item_id );
        if(isset($detail['fk_i_item_id'])) {
            include_once 'item_edit.php';
        }
    }
	Session::newInstance()->_clearVariables();
}

function video_item_edit_post($item) {
	$catId = isset($item['fk_i_category_id'])?$item['fk_i_category_id']:null;
    $item_id = isset($item['pk_i_id'])?$item['pk_i_id']:null;
	if($catId!=null) {
		// We check if the category is the same as our plugin
		if(osc_is_this_category('video_embed_plugin', $catId)) {
			ModelVideo::newInstance()->updateAttr( $item_id, Params::getParam('video') );
		}
	}
}

function video_delete_item($item_id) {
    ModelVideo::newInstance()->deleteItem($item_id) ;
}


function video_admin_menu() {
		echo '<h3><a href="#">Video Embed Plugin</a></h3>
		<ul>
			<li><a href="'.osc_admin_configure_plugin_url("video_embed_plugin/index.php").'">&raquo; '.__('Configure', 'video_embed_plugin').'</a></li>
			<li><a href="'.osc_admin_render_plugin_url("video_embed_plugin/admin/settings.php").'">&raquo; '.__('Settings', 'video_embed_plugin').'</a></li>
		</ul>';
	
}

function video_admin_configuration() {
    // Standard configuration page for plugin which extend item's attributes
    osc_plugin_configure_view(osc_plugin_path(__FILE__));
}

function video_pre_item_post() {
    Session::newInstance()->_setForm('dd_video' , Params::getParam('video'));
    // keep values on session
    Session::newInstance()->_keepForm('dd_video' );
}

osc_add_hook('init_admin', 'video_embed_actions');

osc_add_hook('admin_menu', 'video_admin_menu');


// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'video_call_after_install');
// This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'video_admin_configuration');
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'video_call_after_uninstall');

// When publishing an item we show an extra form with more attributes

// To add that new information to our custom table
osc_add_hook('item_form', 'video_form');

// Edit an item special attributes
osc_add_hook('item_edit', 'video_item_edit');
osc_add_hook('posted_item', 'video_form_post');

if (dd_remove_hook()==false){
	// Show an item special attributes
	osc_add_hook('item_detail', 'video_item_detail');
}

osc_add_hook('video_embed_show', 'video_item_detail');

// Edit an item special attributes POST
osc_add_hook('edited_item', 'video_item_edit_post');

//Delete item
osc_add_hook('delete_item', 'video_delete_item');

// previous to insert item
osc_add_hook('pre_item_post', 'video_pre_item_post') ;

osc_add_hook('save_input_session', 'video_save_inputs_into_session' );
?>
