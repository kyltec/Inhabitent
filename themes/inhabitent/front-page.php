<?php
/**
 * The main template file.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header home-header">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php red_starter_posted_on(); ?> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php red_starter_posted_by(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content front-page-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?><!-- End of default loop -->


		<section class="home-hero">
		<img src="<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-full.svg" alt="" class="home-trees">
		</section>

	<h3 class="front-page-titles">Shop Stuff</h3>
		<section class='front-page-shop'>
		
			<?php

			$terms = get_terms(array(
				'taxonomy' => 'product_type',
				'hide_empty' => 0,
			));


			foreach($terms as $term): ?>
				<div class='frontpage-term'>
					<img class="front-page-image" src="<?php echo get_template_directory_uri() . '/images/product-type-icons/' . $term->slug . '.svg'; ?>" 
								alt="<?php echo $term->name; ?>" />

					<p><?php echo $term -> description; ?></p>	

					<p><a href="<?php echo get_term_link($term); ?>"><?php echo $term -> name;?> Stuff</a></p>
					
				</div>
				<?php endforeach ?>
		
		</section>


		
		<?php
		/*
		* Get the blog journal entries
		*/
  	 		$args = array( 'post_type' => 'post', 'order' => 'date', 'posts_per_page' => 3 );
  	 		$journal_posts = get_posts( $args ); // returns an array of posts
		?>
	<h3 class="front-page-titles">Inhabitent Journal</h3>
		<section class='front-page-journal'>
		
			<?php foreach ( $journal_posts as $post ) : setup_postdata( $post ); ?>
			<article class='front-page-journal-entry'>
		   		<?php 
					the_post_thumbnail('medium');
				?>
				<div class="fp-journal-info">
				<span>
					<?php
						red_starter_posted_on();
						echo ' / ';
						comments_number( '0 Comments', '1 Comment', '% Comments' );
					?>
				</span>
				<div class ='journal-info'>
					<a href="<?php echo get_the_permalink();?>"><?php the_title();?></a>
				</div>
					<button class='fp-btn'><a href="<?php echo get_the_permalink();?>">Read More</a></button>
				</div>
			</article>
		<?php endforeach; wp_reset_postdata(); ?>
		</section>


		<h3 class="front-page-titles">Latest Adventures</h3>
		<section class="adventure-section">
			<div class="adventure-flex">
				<div>
					<p>Getting Back to Nature in a Canoe</p>
					<button class='adventure-btn'><a href="<?php echo get_the_permalink();?>">Read More</a></button>
					<div class="adventure-pic-1"></div>

				</div>
				<div class="adventure-half-container">
					<div>
						<p>A Night With Friends at a Beach</p>
						<button class='adventure-btn'><a href="<?php echo get_the_permalink();?>">Read More</a></button>
						<div class="adventure-pic-2"></div>
					</div>
					<div class="adventure-quart-container">
						<div class="adventure-ind">
							<p>Taking in the View at Big Mountain</p>
							<button class='adventure-btn'><a href="<?php echo get_the_permalink();?>">Read More</a></button>
							<div class="adventure-pic-3" ></div>
						</div>

						<div>
							<p>Star-Gazing at the Night Sky</p>
							<button class='adventure-btn'><a href="<?php echo get_the_permalink();?>">Read More</a></button>
							<div class="adventure-pic-4"></div>
						</div>
					</div>
				</div>
			</div>
		
				<a class="more-adventure" href="#">More Adventure<a>
			
		</section>
		

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
