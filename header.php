<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ersy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="content-fluid">
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="container-fluid header">
	<nav class="navbar navbar-expand-lg header__nav">
  		<div class="container">
			<div class="navbar-brand header__logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
						<h1 class="header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<h1 class="header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					endif;
					$ersy_description = get_bloginfo( 'description', 'display' );
					if ( $ersy_description || is_customize_preview() ) :
						?>
						<p class="header__description"><?php echo $ersy_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div>
					
				<button class="navbar-toggler header__toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon header__toggler--icon"></span>
				</button>
				<?php
					wp_nav_menu(
						array(
							'theme_location' 	=> 'menu-1',
							'menu_id'        	=> 'primary-menu',
							'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarTogglerDemo02',
							'menu_class'      => 'navbar-nav mr-auto',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						)
					);
				?>

			</div>
	</nav>
	</header><!-- #masthead -->
