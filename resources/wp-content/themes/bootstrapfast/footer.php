<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BootstrapFast
 */

?>
			</div><!-- #contennt -->
		</div><!-- .row -->
	</div><!-- .container -->
	<footer id="colophon" class="site-footer <?php echo esc_attr( bootstrapfast_container_type() ); ?>" role="contentinfo">
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bootstrapfast' ) ); ?>"><?php printf( esc_html( 'Proudly powered by %s', 'bootstrapfast' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html( 'Theme: %1$s by %2$s.', 'bootstrapfast' ), 'BootStrapFast', '<a href="https://carl.alber2.com/" rel="designer">Carl Alberto</a>' ); ?>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
