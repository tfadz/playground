<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <section class="hero">

        <main id="main" class="site-main container">
            <h1>This is a Playground for Whatever.</h1>
            
            <div class="row">
                <div class="col-lg-12">
                    <h2>AJAX Example 1</h2>
                    <button id="blog-btn" class="button primary animated">Show Blog </button>
                    <button id="posts-btn" class="button primary animated">Rest API</button>
                    <!-- Rest API -->
                    <div id="posts-container"></div>
                    <!-- Show my blog -->
                    <div class="mycontainer"></div>
                    
                    <hr>
                    
                    <h2>AJAX Example 2</h2>
                    
                    <section class="container sunset-posts-container">

                    </section>

                    <div class="container">
                        <a href="" class="btn btn-lg btn-default sunset-load-more" data-page="" data-url="<?php echo admin_url('admin-ajax.php') ?>">LOAD MORE</a>
                    </div>

                  <hr>

                  <h2>AJAX Example 3</h2>
                  
                  <div class="container">
                    <button id="pw_button" class="btn btn-lg btn-default">Click Me</button>
                 </div>

                 <div>
                   <?php
                   while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/content', 'page' );
                  endwhile; 
                  ?>
                </div>


              </div>
          </div>
      </main><!-- #main -->
  </section>
</div><!-- #primary -->

<?php
get_footer();