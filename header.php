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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="header">
		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="navbar-brand is-flex is-align-items-center">
				<div class="navbar-start is-flex is-justify-content-center is-flex-direction-column m-2">
				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="header__title title is-2 m-0">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php else : ?>
						<h1 class="header__title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
						</h1>
					<?php endif;

						$ersy_description = get_bloginfo( 'description', 'display' );
						if ( $ersy_description || is_customize_preview() ) : ?>
							<p class="header__description is-size-7-mobile has-text-weight-light"><?php echo $ersy_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
						</div>
					<button class="button navbar-burger" data-target="primary-menu">
						<span></span>
						<span></span>
						<span></span>
					</button>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 0,
					'container'         => false,
					// 'items_wrap'     => 'div',
					'menu_class'        => 'navbar-menu',
					'menu_id'           => 'primary-menu',
					'after'             => "</div>",
					'walker'            => new Navwalker())
				);
				?>
		</nav>
	</header><!-- #masthead -->
