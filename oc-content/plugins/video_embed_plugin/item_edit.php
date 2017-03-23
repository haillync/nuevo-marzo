<?php
	if( Session::newInstance()->_getForm('dd_video') != '' ) {
		$detail['s_video'] = Session::newInstance()->_getForm('dd_video');
	}
?>
<div class="control-group">
	<label class="control-label" for="videourl"><?php _e('Video URL', 'video_embed_plugin'); ?></label>
    <div class="controls">
        <input type="text" name="video" id="video" value="<?php if(@$detail['s_video'] != ''){echo @$detail['s_video']; } ?>" />
        <br /><i><small><?php _e('Videos support from Youtube, Vimeo, Facebook, Dailymotion and Metacafe.', 'video_embed_plugin'); ?></small></i>
	</div>
</div>