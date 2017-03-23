<style type="text/css">
	#content-page { background:#e5e5e5; }
	.col6 { width:650px; float:left; margin:0 10px; }
	.col5 { width:500px; float:left;  margin:0 10px; }
	.form-container { border:2px solid #ddd; background:#fff; }
	.form-container h2 { margin:0; padding:10px 15px; background:#E62F27; color:#fff;}
	.form-container fieldset { padding:15px; }
	.form-container .quote { padding:15px; border:1px solid #eee; background:#f9f9f9; margin:15px; }
	.control-group { margin-bottom:15px; }
	.control-label { margin-bottom:5px; display:block; }
	.form-actions { margin-top:15px; margin-bottom:0;}
	.form-horizontal .form-actions { padding-left:15px;}
	.form-container input[type=text] { padding:10px; width:95%; }
	.form-container input[type=text].swidth { width:30%; }
	
	.clearfix { clear:both; }
</style>
<div class="plugin-page">
	<div class="col5">
    	<?php $pluginInfo = osc_plugin_get_info('video_embed_plugin/index.php');  ?>
    	<div class="form-container">
            <h2 class="render-title"><?php _e('Video Embed Plugin Settings', 'video_embed_plugin'); ?></h2>
            <div class="quote"><strong><?php _e('Note:', 'video_embed_plugin'); ?></strong> <?php _e('By checking checkbox below, you can use a custom place for Video on listing page.', 'video_embed_plugin'); ?></div>
            <form action="<?php echo osc_admin_render_plugin_url('video_embed_plugin/admin/settings.php'); ?>" class="form-horizontal" method="post">
                <input type="hidden" name="videooption" value="videosettings" />
                <fieldset>
                <div class="control-group">
                    <div class="controls checkbox">
                        <label><input type="checkbox" <?php echo (dd_remove_hook() ? 'checked="true"' : ''); ?> name="dd_remove_hook" id="dd_remove_hook" value="true" />
                        <?php _e('Remove Auto Video Placement', 'video_embed_plugin'); ?></label>
                    </div>
                  </div>
                </fieldset>
                <div class="quote">
                    <strong><?php _e('Use:', 'video_embed_plugin'); ?></strong> <?php _e('Place following code into any place at item.php theme file.', 'video_embed_plugin'); ?><br /><br /><code>&lt;?php osc_run_hook('video_embed_show');?&gt;</code><br />
                </div>
                
                <fieldset>
                    <h4 style="margin:0 0 10px 0;"><?php _e('Videos support from:', 'video_embed_plugin'); ?></h4>
                    <img src="<?php echo osc_base_url() . 'oc-content/plugins/video_embed_plugin/'; ?>images/supported_img.png" alt="Video Embed Plugin - DrizzleThemes.com" />
                    
                    
                </fieldset>
                
                <div class="form-actions">
                    <input type="submit" value="<?php _e('Save changes', 'video_embed_plugin'); ?>" class="btn btn-submit">
                </div>
            </form>
        </div>
    </div><!-- /COL5 -->
    <div class="clearfix"></div>
</div>

<div class="footer">
    <p class="form-row">
    &copy; <?php echo date('Y'); ?> Video Embed Plugin - <a href="<?php echo osc_admin_render_plugin_url('video_embed_plugin/index.php'); ?>"><?php _e('Configure', 'video_embed_plugin'); ?></a> - <a href="http://www.drizzlethemes.com/">DrizzleThemes.com</a>.
    </p>
</div>