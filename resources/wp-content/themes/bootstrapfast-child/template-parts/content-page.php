<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BootstrapFast
 */

?>
<div class="container">
<h1>content-page.php</h1>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

 
	<div class="entry-content">

		 <?php

				if(get_the_title() == "Press"){
					get_template_part( 'template-parts/content', 'press-release' );
				} else if(get_the_title() == "Blog"){
					get_template_part( 'template-parts/content', 'blog' );
				}else if(wp_get_post_parent_id( get_the_ID()) == 29){
					 //IF Events page is the Parent Page....
					get_template_part( 'template-parts/content', 'webinar' );
					
				}else{
					the_content();
				}


			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bootstrapfast' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php

				$edit_post = false;
				// I commented this out becasuse there doesn't seem to be a need to edit anything on the pages. 
				if($edit_post){
						edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'bootstrapfast' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				}

			
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
</div>