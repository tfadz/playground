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
		<div class="col-lg-12">
			<div class="blog-search-filter">
			

			<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
			<?php
			if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) ) : 

			echo '<select name="categoryfilter"><option value="">Select category...</option>';
			foreach ( $terms as $term ) :
			echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
			endif;
			?>

			
			<label>
			<input type="radio" name="date" value="ASC" /> Date: Ascending
			</label>
			<label>
			<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
			</label>
			<button>Apply filter</button>
			<input type="hidden" name="action" value="myfilter">
			</form>

			</div>
		</div>
	</div>

		<div class="row">
			<div class="col-lg-12">
				<section id="response" class="blog-articles">

			<?php
				if(have_posts()) : 
				while(have_posts()) : 
				the_post(); 
			?>
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

				

			<?php
				endwhile;
				else : 
			?>


			Oops, there are no posts.

			<?php
			endif;
			?>
			


			</section>
</div>		
</div>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
