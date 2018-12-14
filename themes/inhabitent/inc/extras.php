<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

function inhabitent_login_logo() {
	echo '<style type="text/css">                                                                   
		h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/logos/inhabitent-logo-text-dark.svg) !important; 
		height: 120px !important; width: 410px !important; margin-left: -40px !important; margin-bottom:0 !important; background-size: 100% !important; }                            
	</style>';
}
 
add_action('login_head', 'inhabitent_login_logo');

function the_login_url( $login_header_url) {
    return get_bloginfo( 'url' );
}
add_action('login_headerurl', 'the_login_url');


/*
* Custom Hero Image for About Page
*/


function inhabitent_dynamic_css(){

	if(!is_page_template('about.php')){
		return;
	}
	
	$image = CFS()-> get('about_hero_image');
	
	if(!$image){
		$hero_css = ".page-template-about .entry-header {
			background: grey;
			color: white;
			width: 100%
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}";
	}
	else{
		$hero_css = ".page-template-about .entry-header {
			background: grey, cover;
			background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.4) 100%),url({$image});
			color: white;
			width: 100%;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			background-size: cover;
		}";
	}

	wp_add_inline_style('tent-style', $hero_css);


}

add_action('wp_enqueue_scripts', 'inhabitent_dynamic_css');

/**
 * Replace excerpt with Read More
 */

function inhabitent_excerpt_more( $more ){
	global $post;
	return '<p><a class="read-more" href="' . get_permalink($post->ID) . '">Read More → </a></p> ';
 }


	add_filter('excerpt_more', 'inhabitent_excerpt_more');


/**
 * Filter the product archive title
 */


 function inhabitent_archive_title( $title ){
	 if (is_post_type_archive('product') ){
		 $title = 'Shop Stuff';
	 }
	 elseif(is_tax('product_type') ){
		 $title = sprintf('%1$s', single_term_title('', false) );
	 }
	 return $title;
 }

 	add_filter('get_the_archive_title', 'inhabitent_archive_title');

 /**
  * 
  */


  function inhabitent_mod_post_type_archive( $query ){
	  if(
	  ( is_post_type_archive( array( 'product' ) ) || $query->is_tax( 'product_type' ) ) 
	  && !is_admin()
	  && $query->is_main_query()
	  ){
	  $query->set( 'orderby', 'title' );
	  $query->set( 'order', 'ASC' );
	  $query->set( 'post_per_page', 16);
  }
}


  add_action('pre_get_posts', 'inhabitent_mod_post_type_archive');