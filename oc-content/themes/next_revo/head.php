<?php
  		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo meta_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( function_exists('meta_keywords') ) { ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />


<?php
osc_register_script('global', osc_current_web_theme_js_url('global.js'));
osc_register_script('jquery', osc_current_web_theme_js_url('jquery.min.js'));
osc_register_script('jquery-ui', osc_current_web_theme_js_url('jquery-ui.min.js'));
osc_register_script('fancybox', osc_current_web_theme_js_url('fancybox/jquery.fancybox.pack.js'));
osc_register_script('fineuploader', osc_current_web_theme_js_url('fineuploader/jquery.fineuploader.min.js'));
osc_register_script('jquery-validate', osc_current_web_theme_js_url('jquery.validate.min.js'));
osc_register_script('date', osc_current_web_theme_js_url('date.js'));
osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
osc_enqueue_script('global');
osc_enqueue_script('date');
	     osc_enqueue_script('fancybox');
		 osc_enqueue_script('fineuploader');
    osc_enqueue_script('jquery-validate');
 ?>
<link href="<?php echo osc_current_web_theme_url('css/font-awesome.css') ; ?>" rel="stylesheet" type="text/css" />
<?php $getrevocolor = revo_color(); ?>
<link href="<?php echo osc_current_web_theme_url('css/'.$getrevocolor.'.css') ; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('js/fancybox/jquery.fancybox.css') ; ?>" rel="stylesheet" type="text/css" />
 <script type="text/javascript">
    var next = window.next || {};
    next.base_url = '<?php echo osc_base_url(true); ?>';
    next.fancybox_prev = '<?php echo osc_esc_js( __('Previous image','next')) ?>';
    next.fancybox_next = '<?php echo osc_esc_js( __('Next image','next')) ?>';
    next.fancybox_closeBtn = '<?php echo osc_esc_js( __('Close','next')) ?>';
</script>
<?php
osc_run_hook('header');

FieldForm::i18n_datePicker();

?>
<script>
	jQuery(document).ready(function($) {
    $("#mmenu").hide();
    $(".mtoggle").click(function() {
        $("#mmenu").slideToggle(500);
    });
});
</script>