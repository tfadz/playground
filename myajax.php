<?php 

// AJAX FUNCTIONS

add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more');
add_action('wp_ajax_sunset_load_more', 'sunset_load_more');

function sunset_load_more() {
  // load more posts
  $paged = $_POST["page"]+1;
  
  $query = new WP_Query( array(
    'post_type' => 'post',
    'orderby' => 'post__in',
    'posts_per_page' => 3,
    'paged' => $paged,

  ));

 if( $query->have_posts() ):
  while ( $query->have_posts() ) : $query->the_post();
    get_template_part( 'template-parts/content', get_post_format() );

  endwhile; 

endif;

wp_reset_postdata();

  die();
}
