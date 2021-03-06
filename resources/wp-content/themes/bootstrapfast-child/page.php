<?php
/**
 * The template for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BootstrapFast
 */

get_header(); ?>
	<div class="row">
		 
		<?php
		if ( ! bootstrapfast_main_sidebar_placement() ) {
			get_sidebar();
		}
		?>
		<div id="primary" class="content-area col">
			<main id="main" class="site-main" role="main">
					<h1>PAGE.PHP</h1>

				<?php
				while ( have_posts() ) :
					the_post();
  

					?>
				 
					
					<?php

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					 

				endwhile; // End of the loop.
				?>
			</div>
			</main><!-- #main -->
			 
		</div><!-- #primary -->
		<?php
		if ( ! bootstrapfast_main_sidebar_placement() ) {
			get_sidebar();
		}
		?>
	 
	</div><!-- #row -->
	<?php
	get_footer();
