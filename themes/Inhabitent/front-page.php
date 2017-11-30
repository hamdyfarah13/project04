<?php
/**
 * The main template file.
 *
 * @package Inhabitent
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="home-hero">
				<img class='home-hero-logo' src='../../hamdywordpress/wp-content/themes/inhabitent/images/logos/inhabitent-logo-full.svg' alt='White inhabitent logo'>
			</section>

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<section class="product-info container">
            <h2>Shop Stuff</h2>
            <?php
               $terms = get_terms( array(
                   'taxonomy' => 'product-type',
                   'hide_empty' => 0,
               ) );
               if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
            ?>
               <div class="product-type-blocks">
								
                  <?php foreach ( $terms as $term ) : ?>

                     <div class="product-type-block-wrapper">
                        <img src="<?php echo get_template_directory_uri() . '/images/' . $term->slug; ?>.svg" alt="<?php echo $term->name; ?>" />
                        <p><?php echo $term->description; ?></p>
                        <p><a href="<?php echo get_term_link( $term ); ?>" class="btn"><?php echo $term->name; ?> Stuff</a></p>
                     </div>

                  <?php endforeach; ?>

               </div>
               
            <?php endif; ?>
</section>

<?php
   $args = array( 'post_type' => 'post', 'order' => 'DES', 'posts_per_page' => 3 );
   $products = new WP_Query( $args ); 
?>

<div class="journal-block-wrapper">
<h2>Inhabitent Journal</h2>
<ul>
<?php if ( $products->have_posts() ) : ?>
	 <?php while ( $products->have_posts() ) : $products->the_post(); ?>
	 

	 		
			<li>
			<div class='journal-container'>
			<?php the_post_thumbnail('large'); ?> </div>
			<div class='journal-entry-wrapper'><div class='entry-metadata'><?php red_starter_posted_on(); ?> / <span><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span></div><h3><?php the_title(); ?></h3></div>	<a class='journal-button' href='<?php the_permalink(); ?>'>Read Entry</a>
			</li>

   <?php endwhile; ?>
   <?php wp_reset_postdata(); ?>

<?php else : ?>
      <h2>Nothing found!</h2>
<?php endif; ?>
</ul>
</div>

<section class='latest-journal-entries-wrapper'>
<h2>Latest Adventures</h2>

<div class="latest-journal-entries">
	<div class='left-adventure'>
	<div class='adventure-single-wrapper'>
		<h3>Getting Back to Nature in a Canoe</h3>
		<a class='adventure-button' href=''>Read More</a>
		</div>
	</div>
	<div class='right-adventure'>
	<div class='top-adventure'>
	<div class='adventure-single-wrapper'>
	<h3>A Night with Friends at the Beach</h3>
	<a class='adventure-button' href=''>Read More</a>
	</div>
	</div>
	<div class='bottom-adventure'>
		<div class='bottom-left-adventure'>
		<div class='adventure-single-wrapper'>
		<h3>Taking in the View at Big Mountain</h3>
		<a class='adventure-button' href=''>Read More</a>
		</div>
		</div>
		<div class='bottom-right-adventure'>
			<div class='adventure-single-wrapper'>
			<h3>Star-Gazing at the Night Sky</h3>
			<a class='adventure-button' href=''>Read More</a>
							 </div>
		</div>
	</div>
	</div>
</div>
</section>
<?php get_footer(); ?>
