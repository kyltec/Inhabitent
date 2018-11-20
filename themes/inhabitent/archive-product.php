<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area flex-shop">
		<main id="main" class="site-main shop-center" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header shop-header">
				<?php
					the_archive_title( '<h1 class="page-title shop-title">', '</h1>' );
				?>

				<div class='sub-menu'>
					<?php
					$terms = get_terms(array(
					'taxonomy' => 'product_type',
					'hide_empty' => 0,
					));


				foreach($terms as $term): ?>
				<div class='shop-menu'>
					<p><a href="<?php echo get_term_link($term); ?>"><?php echo $term -> name;?></a></p>
					
				</div>
				<?php endforeach ?>

					

				</div>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class="shop-archive">
				<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header shop-item">
						<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_post_thumbnail( 'large' ); ?></a>
						<?php endif; ?>
						
						<div class="product-info">
						<?php the_title( '<h2 class="entry-title shop-item-title">' , '</h2>' ); ?>
						<div class="dots"></div>
						<?php echo '$' . CFS()->get( 'price' ); ?>
						</div>
						
					</header><!-- .entry-header -->

		
				</article><!-- #post-## -->

				<?php endwhile; ?>
			</div>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>