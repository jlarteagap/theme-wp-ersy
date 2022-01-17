<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ersy
 */

get_header();
?>

	<main id="primary" class="container my-5">

		<?php
		if ( have_posts() ) :
			$first_post = true;
			$the_query = new WP_Query( 'posts_per_page=5' );

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;?>

			 <div class="featured__posts">
				<?php 
					while ($the_query -> have_posts()) : $the_query -> the_post(); 
					
					if ($first_post){ 
						$first_post = false; 
						?>
						<div class="featured__posts--top">
							<div class="first__post col-12 p-0 pe-md-3">
								<!-- first post thumbnail  -->
								<?php ersy_firts_post_thumbnail('') ?>
								<div class="post__card-category">
									<!-- firts post category  -->
									<?php the_category( ' ' ); ?>
								</div>
								<!-- first post title  -->
								<?php
									the_title( '<h2 class="post__card--title">
										<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								?>
							</div>
						</div>	
						<?php } else { ?>
							<!-- <div class="row gx-3 gy-2"> -->
								<div class="col-6 col-md-12">
									<div class="post__card d-block d-md-inline-flex">
										<div class="post__thumbnail me-md-4">
											<?php ersy_post_thumbnail() ?>
										</div>
										<div class="post__card-body pe-md-5">
											<div class="post__card-category">
												<?php the_category( ' ' ); ?>
											</div>
											<?php
												the_title( '<h2 class="post__card--title">
													<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
											?>
										</div>
									</div>
								</div>
							<!-- </div> -->

					<?php }
					// Repeat the process and reset once it hits the limit
					endwhile;
					wp_reset_postdata();
					?>
			</div>
		<?php else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<!-- Close container-fluid  -->
	</div>
	<div class="top__post">
		<div class="container py-5">
			<h2 class="top__post-title m-0">
				Featured post
			</h2>
			<p class="top__post-subtitle">Top of the week</p>
		</div>
	</div>
<?php

get_footer();