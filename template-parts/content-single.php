<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Playground
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <!-- Votes -->
    <div class="vote-bar">
        <?php
        $votes = get_post_meta($post->ID, "votes", true);
        $votes = ($votes == "") ? 0 : $votes;
        ?>

        This post has <span id='vote_counter'> <?php echo $votes ?> </span> votes
        <div>
            <?php
            $nonce = wp_create_nonce("my_user_vote_nonce");
            $link = admin_url('admin-ajax.php?action=my_user_vote&post_id='.$post->ID.'&nonce='.$nonce);
            echo '<a class="user_vote" data-nonce="' . $nonce . '" data-post_id="' . $post->ID . '" href="' . $link . '">Vote for this article</a>';
            ?>
        </div>
    </div>

    <!-- end Voting -->


    <?php
    if ( is_singular() ) :
      the_title( '<h1 class="entry-title">', '</h1>' );
    else :
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;

  if ( 'post' === get_post_type() ) :
      ?>
  
<?php endif; ?>
</header><!-- .entry-header -->

<?php playground_post_thumbnail(); ?>
<br />
    <div class="entry-meta">
        <?php
        playground_posted_on();
        playground_posted_by();
        ?>
    </div><!-- .entry-meta -->

<div class="entry-content">
    <?php
    the_content( sprintf(
      wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'playground' ),
        array(
          'span' => array(
            'class' => array(),
        ),
      )
    ),
      get_the_title()
  ) );

    wp_link_pages( array(
      'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'playground' ),
      'after'  => '</div>',
  ) );
  ?>
</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
