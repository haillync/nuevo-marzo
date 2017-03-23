<div id="fb-root"></div>
<script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<?php 
/**
 * @param <type> $attrs
 * @param <type> $body
 * @param <type> $options
 * @return <String>
 */
function dd_video_embed($attrs,  $options) {
    $url = trim($attrs['url']);
    $type = &$attrs['type'];
	
	// YOUTUBE
	if (strpos($url, 'youtube.com') !== false) {
		if ($width == '') $width = 600;
		if ($height == '') $height = 350/600*$width;

		$x = strpos($url, 'watch?v=');
		$url = 'http://www.youtube.com/embed/' . substr($url, $x+8);
		
		$buffer .='<iframe type="text/html" src="' . $url . '" frameborder="0" width="' . $width . '" height="' . $height . '" allowfullscreen></iframe>';
	}
	
	// FACEBOOK
	if (strpos($url, 'facebook.com') !== false) {
		if ($width == '') $width = 600;
		if ($height == '') $height = 350/600*$width;
		
		$videoUrl = $url;
		
		$buffer .='<div class="fb-video" data-allowfullscreen="1" data-href="'.$videoUrl.'"><div class="fb-xfbml-parse-ignore"></div></div>';
	}
	
	// VIMEO
	else if (strpos($url, 'vimeo.com') !== false) {
		if ($width == '') $width = 600;
		if ($height == '') $height = 350/600*$width;
		
		$videoUrl = $url;
		$urlParts = explode("/", parse_url($videoUrl, PHP_URL_PATH));
		$videoId = (int)$urlParts[count($urlParts)-1];
		
		$surl = 'https://player.vimeo.com/video/'.$videoId.'';
		$buffer .= '<iframe src="' . $surl . '" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	
	// METACAFE
    else if (strpos($url, 'metacafe.com') !== false) {
		if ($width == '') $width = 600;
		if ($height == '') $height = 350/600*$width;
		
		$videoUrl = $url;
		$urlParts = parse_url($url, PHP_URL_PATH);
		$pieces = explode('/', $urlParts);
		$videoId = $pieces[2];
		
		$surl = 'http://www.metacafe.com/embed/'.$videoId.'';
		$buffer .= '<iframe frameborder="0" width="' . $width . '" height="' . $height . '" src="' . $surl . '" allowfullscreen></iframe>';
	}
	
	// DAILYMOTION
    else if (strpos($url, 'dailymotion.com') !== false) {
		if ($width == '') $width = 600;
		if ($height == '') $height = 350/600*$width;

		$x = strpos($url, 'dailymotion.com');
		$url = 'http://www.dailymotion.com/embed/' . substr($url, $x+15, -1) . '';
		
		$buffer .= '<iframe frameborder="0" width="' . $width . '" height="' . $height . '" src="' . $url . '" allowfullscreen></iframe>';
	}

    return $buffer;
} 
?>
<style type="text/css">
	.video-container {
		position: relative;
		padding-bottom: 56.25%;
		padding-top: 30px; height: 0; overflow: hidden;
	}
	 
	.video-container iframe,
	.video-container object,
	.video-container embed {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
</style>
<?php if ($detail['s_video'] != null) { ?>
<h3><?php _e('Video', 'video_embed_plugin') ; ?></h3>
<div class="video-container">
	<?php echo dd_video_embed(array('url'=> $detail['s_video']),""); ?>
</div>
<?php } ?>