 <div class="container">
 <h1>content-blog.php</h1>
 <section>
  <div class="container">
    <div class="row">
    <?php
    
    $query = new WP_Query(array(
        'post_type' => 'post',
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
              <p><?php the_content(); ?></p>
              
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