<?php
/**
 * The template for displaying all single products.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'singleproduct' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
			<div class="social-buttons">
	<button type="button" class="black-btn"><i class="fa fa-facebook"></i>Like</button>
	<button type="button" class="black-btn"><i class="fa fa-twitter"></i>Tweet</button>
	<button type="button" class="black-btn"><i class="fa fa-pinterest"></i>Pin</button>
		<?php endwhile; // End of the loop. ?>
			</div>
		</main><!-- #main -->
  </div><!-- #primary -->
  
<?php get_footer(); ?>