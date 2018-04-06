<?php
/**
 * The header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BootstrapFast
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
 
</head>
<body <?php body_class(); ?>>
	<div class="<?php echo esc_attr( bootstrapfast_container_type() ); ?>"  >
		<div class="row"  >
			<header id="masthead" class="container site-header col-xs-12 <?php echo esc_attr( bootstrapfast_main_header_style() ); ?>" role="banner"  >
				 
				<div class="row header-row"   >
					<div class="col-lg-2">
						&nbsp; 
					</div>
					<div class="asi-plm-logo-div col-lg-4">
						 <a class="logo" href="<?php echo(get_site_url()); ?>">
		                  <img src="http://asihub-cdn.s3.amazonaws.com/plm/img/ASI_logo_PLM.png" alt="Advanced Solutions Product Lifecycle Management Logo" height="53" width="220">
		                </a>
					</div>
					<div class="site-branding col-md-6" style="display:none;/*OVERRIDE THE PARENT AND HIDE THIS */">
						<?php
						if ( bootstrapfast_get_the_logo_url() ) {
							?>
							<div id="site-header">
								<?php the_custom_logo(); ?>
							</div>
							<?php
						} else {
							if ( is_front_page() && is_home() ) {
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							} else {
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							}

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) {
								?>
								<p class="site-description"><?php echo esc_attr( $description ); ?></p>
								<?php
							}
						}
						?>
					</div><!-- .site-branding -->
					<?php
					if ( is_active_sidebar( 'top-sidebar-1' ) ) {
						dynamic_sidebar( 'top-sidebar-1' );
					}
					?>
					<!-- /// MOVE THE NAVIGATIO UP TO THIS ROW -->
					<div class="col-lg-6">
						<nav id="site-navigation" class="main-navigation " role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'bootstrapfast' ); ?></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							));
							?>
						</nav><!-- #site-navigation -->	
					</div>

				</div>
				
							<?php // theme translation. ?>
				<?php
				if ( bootstrapfast_main_sidebar_placement() ) {
						get_sidebar();
				}
				?>

 				
  				<?php
  					//plm_dynamic_hero(get_the_title());
  				?>

			</header><!-- #masthead -->

			<div id="content" class="container site-content col-xs-12 <?php echo esc_attr( bootstrapfast_main_body_style() ); ?>">
