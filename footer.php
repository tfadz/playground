<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Playground
 */
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="site-footer__main container">
        <div class="row justify-content-">
          <div class="col-lg-8">
            <nav class="footer-menu">
              <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav>
    </div>
    <div class="col-lg-4 justify-content-end d-flex">
        <div class="site-info">
           &copy; Copyright <?php echo date("Y"); ?> Playground
       </div><!-- .site-info -->
   </div>
</div>
</div>
</footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>