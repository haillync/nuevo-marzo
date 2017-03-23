<?php
 		   /*
 * Copyright 2015 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<!-- container -->
<div id="next_menu" class="span9" data-tablet="span8">

	<ul id="meganavigator" class="navi"><li class="level1 home">
	<a title="<?php _e('Home', 'next_revo'); ?>" class="level1 item-link" href="<?php echo osc_base_url(); ?>"> <span class="menu-title"><i class="fa fa-home"></i> <?php _e('Home', 'next_revo'); ?></span></a>	
	</li>
	<?php if(osc_users_enabled()) { ?>
                <?php if( osc_is_web_user_logged_in() ) { ?>
				<li class="level1 ">
	<a title="<?php _e('My account', 'next_revo'); ?>" class="level1  item-link" href="<?php echo osc_user_dashboard_url(); ?>" ><span class="menu-title"><?php _e('My account', 'next_revo'); ?></span></a>	
	</li>
	<li class="level1 ">
	<a title="<?php _e('Logout', 'next_revo'); ?>" class="level1  item-link" href="<?php echo osc_user_logout_url(); ?>" ><span class="menu-title"><?php _e('Logout', 'next_revo'); ?></span></a>	
	</li>
	<?php } else { ?>
	<li class="level1 ">
	<a title="<?php _e('Login', 'next_revo'); ?>" class="level1  item-link" href="<?php echo osc_user_login_url(); ?>" ><span class="menu-title"><?php _e('Login', 'next_revo'); ?></span></a>	
	</li>
	<?php if(osc_user_registration_enabled()) { ?>
	<!--<li class="level1 ">
	<a title="<?php _e('Registration', 'next_revo'); ?>" class="level1  item-link" href="<?php echo osc_register_account_url(); ?>" ><span class="menu-title"><?php _e('Registration', 'next_revo'); ?></span></a>
	</li>-->
     <?php }; ?>
	 <?php } ?>
	 <?php } ?>
	 <li class="level1 ">
	<a title="<?php _e('Contact', 'next_revo'); ?>" class="level1  item-link" href="<?php echo osc_contact_url(); ?>" ><span class="menu-title"><?php _e('Contact', 'next_revo'); ?></span></a>	
	</li>
	<?php if ( osc_count_web_enabled_locales() > 1) { ?>
                <?php osc_goto_first_locale() ; ?>
                <li class="level1 last havechild ">
                    <a class="level1  item-link" href="#" ><span class="menu-title"><?php _e("Language", 'next_revo') ; ?></span></a>
					<div class="level2 menu mega-content" >
			        <div class="mega-content-inner"> 
					<div class="mega-col first one" >
						<ul class="subnavi level2">
				
                        <?php $i = 0 ;  ?>
                        <?php while ( osc_has_web_enabled_locales() ) { ?>
                            <li class="level2 "> <a id="<?php echo osc_locale_code() ; ?>" class="level2  item-link" href="<?php echo osc_change_language_url ( osc_locale_code() ) ; ?>"><span class="menu-title"><?php echo osc_locale_name() ; ?></span></a></li>
                            <?php $i++ ; ?>
                        <?php } ?>
                    </ul></div>
				
			</div>
		</div>
                </li>
            <?php } ?>
	<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
	<li class="active level1 first ">
	<a title="<?php echo "Publica tu Aviso";?>" class="active level1 first  item-link" href="<?php echo osc_item_post_url_in_category(); ?>" >  <span class="menu-title"><i class="fa fa-pencil-square-o"></i> <?php echo "Publica tu Aviso";?></span></a>	
	</li>
	<?php } ?>
	</ul>
	
	<nav id="mobile">

    <div id="toggle-bar">
         <div id="left"> <a class="home" href="<?php echo osc_base_url(); ?>"><i class="fa fa-home fa-3x"></i></a></div>
		 <div
       <div id="right"> <a class="navicon mtoggle" href="#"><i class="fa fa-bars fa-3x"></i></a></div>
    </div>

    <ul id="mmenu">
        <li><a href="/"><?php _e('Home', 'next_revo'); ?></a></li>
		<?php if(osc_users_enabled()) { ?>
                <?php if( osc_is_web_user_logged_in() ) { ?>
				<li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'next_revo'); ?></a></li> 
	<li><a href="<?php echo osc_user_logout_url(); ?>" ><?php _e('Logout', 'next_revo'); ?></a></li> 
	<?php } else { ?>
	<li><a href="<?php echo osc_user_login_url(); ?>" ><?php _e('Login', 'next_revo'); ?></a></li> 
	<?php if(osc_user_registration_enabled()) { ?>
	<li><a href="<?php echo osc_register_account_url(); ?>" ><?php _e('Registration', 'next_revo'); ?></a></li> 
     <?php }; ?>
	 <?php } ?>
	 <?php } ?>
	  <li><a href="<?php echo osc_contact_url(); ?>" ><?php _e('Contact', 'next_revo'); ?></a></li> 
	 <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
     <li><a href="<?php echo osc_item_post_url_in_category(); ?>" ><?php _e("Publish your ad", 'next_revo');?></a></li> 
	<?php } ?>  	
    </ul>
 </nav>

	</div>
	
	 
	
<div class="container">
<!-- header -->
<div id="header">
    <a id="logo" href="<?php echo osc_base_url(); ?>">
    <?php echo logo_header(); ?>
    </a>
     <?php if( osc_get_preference('header-nextrevo', 'next_revo') != '') {?>
                <!-- header ad Adaptive-->
                <div class="ads_header">
                    <?php echo osc_get_preference('header-nextrevo', 'next_revo'); ?>
                </div>
                <!-- /header ad Adaptive-->
                <?php } ?>   

</div>
<div class="clear"></div>
<!-- /header -->
<div class="hw" style="text-align:center;">
<?php osc_show_widgets('header') ; ?>
</div>
<?php
    $breadcrumb = osc_breadcrumb('&raquo;', false);
    if( $breadcrumb != '') { ?>
    <div class="breadcrumb">
        <?php echo $breadcrumb; ?>
        <div class="clear"></div>
    </div>
<?php
    }
?>
<div class="forcemessages-inline">
    <?php osc_show_flash_message(); ?>
</div>
