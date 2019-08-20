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
    <?php
    if ( is_singular() ) : the_title( '<h1 class="entry-title">', '</h1>' );
    else :
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;

    if ( 'post' === get_post_type() ) : 
    ?>

    <div class="tn">
    <a href="<?php the_permalink(); ?>" class="blog-tn" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');"></a></div>

        <div class="entry-meta">
            <?php
                playground_posted_on();
                // playground_posted_by();
            ?>
        </div>
    <?php endif; ?>
</header><!-- .entry-header -->


</article><!-- #post-<?php the_ID(); ?> -->

