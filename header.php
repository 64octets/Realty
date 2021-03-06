<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Realty
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<div class="header-top row">
			<div class="three columns">
						<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );						
						if (!$image[0]):?>
							<div class="logo"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></div>
						<?php else :?>
							<div class="logo"><a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( $image[0] ); ?>"></a></div>
						<?php endif;?>	
						
			</div>
			<div class="field three columns push_six">
				<?php get_search_form();?>
			</div>
		</div>
		<!-- container to normalize fixed navigation behavior when scrolling -->
		<div class="navcontain">
			<div class="navbar" gumby-fixed="top" id="nav3">
				<div class="row">
					<?php 
					$menu_name = 'primary';

					if( has_nav_menu('primary') ){
						echo '<a class="toggle" gumby-trigger="#nav3 > .row > ul" href="#"><i class="icon-menu"></i></a>';
						wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>'', 'fallback_cb' =>'', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'walker' => new realty_walker) );
					}
					else 
						echo '<ul><li><a href="' . esc_url( home_url('/') ) . '/wp-admin/nav-menus.php">Go to "Appearance - Menus" to set-up menu</a></li></ul>';	
					?>

				</div>
			</div>
		</div>
	</header><!-- #masthead -->