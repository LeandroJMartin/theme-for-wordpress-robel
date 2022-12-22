<?php

/**
 * Theme default by Maya Comunicação
 *
 * @link get_site_url();
 *
 * @package WordPress
 * @subpackage theme slug
 * @since 1.0
 */

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

function aiwp_scripts(){

    /*-- Js --*/
    wp_enqueue_script( 'aiwp_jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array(), '3.6.0', true  );
    wp_enqueue_script( 'aiwp_owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true  );
    wp_enqueue_script( 'aiwp_fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array( 'jquery' ), '4.0', true  );
    wp_enqueue_script( 'aiwp_interactive-js', 'https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js', array( 'jquery' ), '1.10.11', true  );
    wp_enqueue_script( 'aiwp_ambientes', get_template_directory_uri() .'/assets/js/get-ambientes.js', array( 'jquery' ), false, true  );
    wp_enqueue_script( 'aiwp_modules', get_template_directory_uri() .'/assets/js/get-modules.js', array( 'jquery' ), false, true  );
    wp_enqueue_script( 'load_ajax', get_template_directory_uri() . '/assets/js/get-products.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'aiwp_script', get_template_directory_uri() .'/assets/js/theme-scripts.js', array( 'jquery' ), false, true  );

    /*-- PHP --*/
    wp_localize_script( 'load_ajax', 'load_ajax', array( 'ajax' => admin_url( 'admin-ajax.php' ) ) );

    /*-- Css --*/
    wp_enqueue_style( 'aiwp_reset', get_template_directory_uri() . '/assets/css/app.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'aiwp_owl.carousel.min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'aiwp_owl.carousel.theme-css', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.3.4', 'all' );
    wp_enqueue_style( 'aiwp_fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array(), '4.0', 'all' );
    wp_enqueue_style( 'aiwp_style_min', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'aiwp_style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );

    /*-- Google fonts --*/
    wp_enqueue_style( 'cdv_google_font', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">' );
}
add_action('wp_enqueue_scripts', 'aiwp_scripts');

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support('category-thumbnails');

function wp_pagination() {
  global $wp_query;

  $big = 999999999;

  echo paginate_links( array(
    'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'  => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total'   => $wp_query->max_num_pages
  ));
};


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function meu_widget() {

  register_sidebar( array(
    'name'          => 'Widgets',
    'id'            => 'widgets',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="Widgets">',
    'after_title'   => '</h2>',
    'description'   => 'área de widgets',
  ));

}
add_action( 'widgets_init', 'meu_widget' );

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
  add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


/**
 * Create theme slug
 */
function cts_add_theme_slug() {
	return 'robel';
}

add_action( 'after_setup_theme', 'mytheme_load_textdomain' );

function mytheme_load_textdomain() {
  load_theme_textdomain( cts_add_theme_slug(), get_template_directory() . '/languages');
}

function i18n($text){
  return _e($text, cts_add_theme_slug());
}

add_action( 'wp_ajax_funcao_que_recebe_os_dados', 'funcao_que_recebe_os_dados' );
add_action( 'wp_ajax_nopriv_funcao_que_recebe_os_dados', 'funcao_que_recebe_os_dados' );

function funcao_que_recebe_os_dados() {

  $category = $_POST['category'];

  $wp_query = new WP_Query(array(
    'post_type' => 'produtos',
    'posts_per_page' => -1,
    'order'    => 'ASC',
    'meta_query' => array(
      array(
        'key'     => 'tipo_do_produto',
        'value'   => $category,
        'compare' => '=',
      ),
    ),
  ));

  $array = [];

  while( $wp_query->have_posts() ) : $wp_query->the_post();

   $gallery = get_field('imagens_produto');

   $url = get_the_permalink();
   $img = $gallery[0]['url'];

   if($gallery){
     array_push($array, [
       'url' => $url,
       'img' => $img
     ]);
   }

  endwhile;

  wp_send_json( $array );

  wp_reset_postdata();

}
