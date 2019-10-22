<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Playground
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main container">

		<div class="row">
			<div class="col-lg-4">
						<?php echo do_shortcode( '[searchandfilter fields="search,category,post_tag" types=",checkbox,checkbox" headings=",Categories,Tags"]
' ); ?>
			</div>


		<div class="col-lg-8">
			<?php
			if(have_posts()) : 
				while(have_posts()) : the_post(); 
					?>
					<?php get_template_part( 'template-parts/post-card'); ?>
				<?php endwhile; else : ?>
				Oops, there are no posts.
				<?php
			endif;
			?>
		</div>
	</main>
		


		


</main><!-- #main -->
</div><!-- #primary -->

<?php
// get_footer();
