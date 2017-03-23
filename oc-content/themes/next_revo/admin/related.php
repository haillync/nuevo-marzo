<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
if ( !OC_ADMIN ) exit('User access is not allowed.');
    
    $ra_numads            = '';
    $dao_preference = new Preference();
    if(Params::getParam('related_next_ra_numads') != '') {
        $ra_numads = Params::getParam('related_next_ra_numads');
    } else {
        $ra_numads = (osc_related_next_ra_numads() != '') ? osc_related_next_ra_numads() : '' ;
    }
    
    $category            = '';
    $dao_preference = new Preference();
    if(Params::getParam('related_next_ra_category') != '') {
        $category = Params::getParam('related_next_ra_category');
    } else {
        $category = (osc_related_next_category() != '') ? osc_related_next_category() : '' ;
    }
    
    $region            = '';
    $dao_preference = new Preference();
    if(Params::getParam('related_next_ra_region') != '') {
        $region = Params::getParam('related_next_ra_region');
    } else {
        $region = (osc_related_next_region() != '') ? osc_related_next_region() : '' ;
    }
    
    $country            = '';
    $dao_preference = new Preference();
    if(Params::getParam('related_next_ra_country') != '') {
        $country = Params::getParam('related_next_ra_country');
    } else {
        $country = (osc_related_next_country() != '') ? osc_related_next_country() : '' ;
    }
    
    $picOnly            = '';
    $dao_preference = new Preference();
    if(Params::getParam('related_next_picOnly') != '') {
        $picOnly = Params::getParam('related_next_picOnly');
    } else {
        $picOnly = (osc_related_next_picOnly() != '') ? osc_related_next_picOnly() : '' ;
    }
    
    
    $premiumonly            = '';
    $dao_preference = new Preference();
    if(Params::getParam('related_next_premiumonly') != '') {
        $premiumonly = Params::getParam('related_next_premiumonly');
    } else {
        $premiumonly = (osc_related_next_premiumOnly() != '') ? osc_related_next_premiumOnly() : '' ;
    }
    
    
    
    if( Params::getParam('option') == 'stepone' ) {

        osc_set_preference('related_next_ra_numads', ($ra_numads), 'next_revo');
        osc_set_preference('related_next_ra_category', ($category ? '1' : '0'), 'next_revo');
        osc_set_preference('related_next_ra_country', ($country ? '1' : '0'), 'next_revo');
        osc_set_preference('related_next_ra_region', ($region ? '1' : '0'), 'next_revo');
        osc_set_preference('related_next_picOnly', ($picOnly ? '1' : '0'), 'next_revo');
        osc_set_preference('related_next_premiumonly', ($premiumonly ? '1' : '0'), 'next_revo');


        osc_add_flash_ok_message(__('Setting saved successfully', 'next_revo'), 'admin');
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/next_revo/admin/related.php')); exit;
    }
    unset($dao_preference) ;
    
?>
<h2 class="render-title "><?php _e('Related Ads Preferences', 'next_revo'); ?></h2>

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/next_revo/admin/related.php'); ?>" method="post" enctype="multipart/form-data" class="nocsrf">
    <input type="hidden" name="action_specific" value="related_revo" />
    <input type="hidden" name="option" value="stepone" />
    
    <fieldset>
        
<div class="form-horizontal">

        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="related_next_ra_numads" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Number of related ads  ', 'next_revo'); ?></label>:
        </div>
         
        <div class="form-controls"><input type="text" name="related_next_ra_numads" id="related_next_ra_numads" value="<?php echo $ra_numads; ?>" />
        <div class="help-box"><?php _e('Enter how many ads you want to show on Item Page (Default is 4)', 'next_revo'); ?></div>
       </div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="related_next_premiumonly" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show only premium ads', 'next_revo'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="related_next_premiumonly" id="related_next_premiumonly">
        	<option <?php if($premiumonly ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'next_revo'); ?></option>
        	<option <?php if($premiumonly ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'next_revo'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes if you want to show premium ads only', 'next_revo'); ?></div>
        </div></div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="related_next_picOnly" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with pictures only', 'next_revo'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="related_next_picOnly" id="related_next_picOnly">
        	<option <?php if($picOnly ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'next_revo'); ?></option>
        	<option <?php if($picOnly ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'next_revo'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes if you want to show ads with picture only', 'next_revo'); ?></div>
        </div></div>
        </div>
       
       	<div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="related_next_ra_category" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with same category', 'next_revo'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="related_next_ra_category" id="related_next_ra_category">
        	<option <?php if($category ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'next_revo'); ?></option>
        	<option <?php if($category ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'next_revo'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to Filter ads by Category', 'next_revo'); ?></div>
        </div></div>
        </div>
       
       	<div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="related_next_ra_country" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with same country', 'next_revo'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="related_next_ra_country" id="related_next_ra_country">
        	<option <?php if($country ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'next_revo'); ?></option>
        	<option <?php if($country ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'next_revo'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to Filter ads by Country', 'next_revo'); ?></div>
        </div></div>
        </div>
        
        <div class="form-row"><div class="form-label wide" style="width:400px;border-bottom:1px solid grey;">
        <label for="related_next_ra_region" style="font-weight: bold;float:left;margin-left:40px;"><?php _e('Show ads with same region', 'next_revo'); ?></label>:
        </div>
        <div class="form-controls"><div class="form-label-selection">
        <select name="related_next_ra_region" id="related_next_ra_region">
        	<option <?php if($region ==0){echo 'selected="selected"';}?> value='0'><?php _e('No', 'next_revo'); ?></option>
        	<option <?php if($region ==1){echo 'selected="selected"';}?> value='1'><?php _e('Yes', 'next_revo'); ?></option>
        </select>
        <div class="help-box"><?php _e('Select Yes to Filter ads by Region', 'next_revo'); ?></div>
        </div></div>
        </div>
        



</div>
        
        <input type="submit" value="<?php _e('Save Settings', 'next_revo'); ?>" class="btn btn-submit" style="margin-left:150px; padding:7px 40px;"/>
        
     </fieldset>
    
</form>
