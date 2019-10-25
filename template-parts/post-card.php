<article class="post">
    <header>
        <h2><?php the_title() ?></h2>

        <div class="tn" style="background-image:ur() no-repeat;">
        <a href="<?php the_permalink(); ?>" class="blog-tn" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');"></a>
    </div>
    <div class="entry-meta">
      <?php
        playground_posted_on();
      ?>
  </div>
</header>
</article>