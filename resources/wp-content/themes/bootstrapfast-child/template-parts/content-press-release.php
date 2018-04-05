 <div class="container">
<script type="text/javascript">
<!--
var timeOut;
function scrollToTop() {
   
   
  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
    window.scrollBy(0,-30);
    timeOut=setTimeout('scrollToTop()',12);
  }
  else clearTimeout(timeOut);
   
  
}
 function putInMainDiv(elem){
	var contents = jQuery("#"+elem).html();
 	jQuery("#main").html( contents);
 	scrollToTop();
}
// -->
</script>
 <section>
 	<div class="container">
        <div class="row">
		<?php

		$query = new WP_Query(array(
			    'post_type' => 'press_release',
			    'post_status' => 'publish',
			    'posts_per_page' => -1,
			));

			while ( $query->have_posts() ) {
			    $query->the_post();
			    $post_id = get_the_ID();
			   
			    ?>
			      <div class="large-4 columns">
		              <div class="post" data-equalizer-watch="" itemprop="blogPost">

		                <h2 class="post-title" itemprop="name"><?php the_title(); ?></h2>
		                 
		                	<?php the_date( get_option( 'date_format' ) ); ?>
		                
		                <span class="post-date">
		                	<time datetime="2016-01-18" itemprop="dateCreated">
		                		<?php the_date( get_option( 'date_format' ) ); ?>
		                	</time>
		                </span>
		                	 
								<?php
								//here we get the TEASER custom field
								  $custom_fields = get_post_custom($post_id);
								  $my_custom_field = $custom_fields['teaser'];
								  if($my_custom_field){
								  	foreach ( $my_custom_field as $key => $value ) {
									    echo  "<p> " . $value . "<p>";
									  }
								  }
								?>
					 
 						<a onclick="putInMainDiv('fullStory_<?php echo($post_id); ?>')">Read More...</a>
		                 
		                <div class="hiddenContent" style="display:none;">
		                <div id="fullStory_<?php echo($post_id); ?>"  >
		                	 <div class="container ">
		                		<div class=" back-to-press">
		                			<a href='http://projectlifecyclemanagement.solutions:8080/press/'>back</a>
		                		</div>
		                	 </div>
							<?php  the_content(); ?>
							 
		                </div>
		                 
		            </div>
		              </div>
		            </div>

		<?php

			}
			wp_reset_query();

		?>

		</div>
	</div>
</section>

</div>