<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BootstrapFast
 */

get_header(); ?>
	<div class="row">
		<div class="container">
		<?php
		if ( ! bootstrapfast_main_sidebar_placement() ) {
			get_sidebar();
		}
		?>
		<div id="primary" class="content-area col">
			<main id="main" class="site-main" role="main">
				<h1>Single.php</h1>
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="headercontainer">
						<?php echo( the_post_thumbnail() ); ?>
					</div>
				<?php } ?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	</div><!-- #row -->
	<?php
	get_footer();
