<?php
/**
 * Polis Theme functions and definitions
 *
 * @package Polis Theme
 */

define( 'ACF_LITE' , false );

require get_template_directory() . '/inc/acf.php';

/**
 * Desabilita o script HeartBeat no Admin, exceto em post.php e post-new.php.
 */
add_action( 'init', 'polis_deregister_heartbeat', 1 );
function polis_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
		wp_deregister_script('heartbeat');
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'polis_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function polis_theme_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Polis Theme, use a find and replace
		 * to change 'polis-theme' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'polis-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'polis-theme' ),
		) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'quote', 'status' ) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'polis_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	}
endif; // polis_theme_setup
add_action( 'after_setup_theme', 'polis_theme_setup' );

function emptyReturn( $var ) {
	$var = trim( $var );
	$var = empty( $var );

	return $var;
}

function get_campoPersonalizado( $campo ) {
	$informacao_campo = get_post_custom_values( $campo );

	return $informacao_campo[0];
}
function resumo( $custom_max = '' ){
	global $_query;
	$string = get_the_excerpt();

	if ( empty( $custom_max ) ) {
		$max = 100;		
	} else {
		$max = $custom_max;
	}

	if (strlen($string) > $max) {
		while (substr($string,$max,1) <> ' ' && ($max < strlen($string))){
			$max++;
		};
	};
	return substr( $string, 0, $max ) . " [...]";
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'slider-publicacoes-thumb', 160, 240, true );
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function polis_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widgets-Home', 'polis-theme' ),
		'id'            => 'widgets-home',
		'before_widget' => '<aside class="col-md-4">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name' => __( 'Widgets-institucional', 'polis-theme' ),
		'id'   => 'widgets-institucional',
	) );

}

add_action( 'widgets_init', 'polis_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function polis_theme_scripts() {
	wp_enqueue_style( 'polis-theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'eve-style', get_template_directory_uri() . '/style-eve.css' );
	//wp_enqueue_style( 'twentyeleven-style', get_stylesheet_directory_uri() . '/style-twentyeleven.css' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'polis-theme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120206', true );
	wp_enqueue_script( 'polis-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'polis-theme-caroufredsel', get_template_directory_uri() . '/js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js', array(), '20120206', true );
	wp_enqueue_script( 'polis-theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20120206', true );


	wp_enqueue_script( 'polis-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'polis_theme_scripts' );

function admin_polis_scripts() {
	wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/style-admin.css' );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js' );
}

add_action( 'admin_head', 'admin_polis_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load CPT Ações file.
 */
require get_template_directory() . '/inc/cpt-acoes.php';

/**
 * Load CPT Notícias file.
 */
require get_template_directory() . '/inc/cpt-noticias.php';
require get_template_directory() . '/inc/tax-tags.php';

/**
 * Load CPT Publicações file.
 */
require get_template_directory() . '/inc/cpt-publicacoes.php';
require get_template_directory() . '/inc/tax-autor.php';

/**
 * Load Tax Categorias to CPT Publicações, Notícias e Ações.
 */
require get_template_directory() . '/inc/tax-areas.php';

/**
 * Load Tax Tipos to CPT Publicações e Notícias.
 */
require get_template_directory() . '/inc/tax-tipos.php';

require_once( get_stylesheet_directory() . '/router.php' );


function custom_images() {
	add_image_size( 'slider-news-image', 615, 171 );
	add_image_size( 'slider-publicacoes-image', 151, 228 );
}

add_action( 'init', 'custom_images', 1 );

register_nav_menu( 'footer-institucional', 'Footer Institucional' );
register_nav_menu( 'footer-atuacao', 'Footer Areas de Atuação' );
register_nav_menu( 'footer-projetos', 'Footer Projetos' );
register_nav_menu( 'footer-biblioteca', 'Footer Bibliotecas' );

// options framework codes

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework/inc/options-framework.php';
include( dirname( __FILE__ ) . "/options.php" );
//ajax
require get_template_directory() . '/publicacoes-slider-ajax.php';
require get_template_directory() . '/institucional-ajax.php';
require get_template_directory() . '/areas-ajax.php';

//widget home

/**
 * Imprime o menu na Home de cada Área com link para as outras 3 Áreas
 */
function outras_areas() {

	$array_areas  = array( "cidadania-cultural", "democracia-e-participacao", "inclusao-e-sustentabilidade", "reforma-urbana" );
	$current_area = get_term_by( 'slug', get_query_var( 'area' ), 'categorias' );

	if ( ( $key = array_search( $current_area->slug, $array_areas ) ) !== false ) {
		unset( $array_areas[$key] );
	}

	echo "<ul>";
	echo "<li class=title-outras>Outras áreas de atuação</li>";

	foreach ( $array_areas as $area ) {
		$each_area = get_term_by( 'slug', $area, 'categorias' );
		echo "<li class='btn-" . $each_area->slug . "'>";
		echo "<a href='" . home_url() . "/area/" . $each_area->slug . "'>" . $each_area->name . "</a>";
		echo "</li>";
	}

	echo "</ul>";

}

function todas_areas() {

	$array_areas = array( "cidadania-cultural", "democracia-e-participacao", "inclusao-e-sustentabilidade", "reforma-urbana" );

	echo "<ul>";
	echo "<li class=title-outras>Outras áreas de atuação</li>";

	foreach ( $array_areas as $area ) {
		$each_area = get_term_by( 'slug', $area, 'categorias' );
		echo "<li class='btn-" . $each_area->slug . "'>";
		echo "<a href='" . home_url() . "/area/" . $each_area->slug . "'>" . $each_area->name . "</a>";
		echo "</li>";
	}

	echo "</ul>";

}

function return_term_biblioteca($slug) {
	global $post;
	$terms = get_the_terms( $post->ID, $slug );

	if ( $terms && ! is_wp_error( $terms ) ) :

		foreach ( $terms as $term ) {
			return $term->slug;
			break;
		}
	endif;
}

function return_term_biblioteca_area() {
	global $post;
	$slug = 'categorias';
	$terms = get_the_terms( $post->ID, $slug );

	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			if($term->slug == 'cidadania-cultural' || $term->slug == 'democracia-e-participacao' || $term->slug == 'inclusao-e-sustentabilidade' || $term->slug == 'reforma-urbana'){
				return $term->slug;
				break;
			}
		}
	endif;
}
function return_term_biblioteca_name($slug) {
	global $post;
	$terms = get_the_terms( $post->ID, $slug );

	if ( $terms && ! is_wp_error( $terms ) ) :


		foreach ( $terms as $term ) {
			return $term->name;
			break;
		}
	endif;
}

require get_template_directory() . '/inc/widget.php';
// conteudo para users logados
require get_template_directory() . '/inc/error_login.php';
function theme( $arg = '' ) {
	$theme = get_template_directory_uri();
	if ( !empty( $arg ) ) {
		$theme .= $arg;
	}
	return $theme;
}

function terms( $taxonomy ) {
	global $post;
	$terms = get_the_terms( $post->ID, $taxonomy );
	if ( $terms && ! is_wp_error( $terms ) ) :
		$links = array();
		foreach ( $terms as $term ) {
			$links[] = $term->name;
		}
		$the_terms = join( ", ", $links );
		return $the_terms;
	endif;
}

function escape_terms( $taxonomy ) {
	global $post;
	$terms = get_the_terms( $post->ID, $taxonomy );
	if ( $terms && ! is_wp_error( $terms ) ) :
		$links = array();
		foreach ( $terms as $term ) {
			$links[] = $term->slug;
		}
		$the_terms = join( ", ", $links );
		return $the_terms;
	endif;
}

function top_term( $taxonomy, $echo = '' ) {
	global $post;
	$terms = get_the_terms( $post->ID, $taxonomy );
	if ( $terms && ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term ) { 	 
		$parent = $term->parent;
			if ( $parent=='0' ) {
				if ( empty( $echo ) ) {
					echo $term->name;
				} elseif ( $echo == 'a' ) {
					echo '<a class="top_term_link" href="' . get_term_link( $term, $taxonomy ) . '">' . $term->name . '</a>';
				} elseif ( $echo == 'slug' ) {
					echo $term->slug;
				} elseif ( $echo == 'return' ) {
					return $term->name;
				}
			}
		}
	}
}

function child_term( $taxonomy ) {
	$terms = get_the_terms( $post->ID, $taxonomy );
	 
	foreach ($terms as $term) { 	 
	$parent = $term->parent;
		if ( ! $parent == '0' ) {
		    echo '<a class="" href="' . get_term_link( $term, $taxonomy ) . '">' . $term->name . '</a>';   
		}
	}
}

function cpt_name() {
	$obj = get_post_type_object( get_post_type( $post ) );
	echo $obj->labels->name;
}

/**
* Custom logo login.
*/
add_action('login_head', 'custom_logo_login');
function custom_logo_login() {
	echo '
	<style type="text/css">
		body.login div#login {
			padding: 5% 0 0;
		}
		body.login div#login h1 {
			text-align: center;
			margin: 0 auto;
		}
		body.login div#login h1, body.login div#login h1 a {
			width: 230px;
			height: 230px;
		}
		body.login div#login h1 a {
			background-image: url( ' . get_bloginfo('template_directory') . '/img/logo-polis-login.png) !important;
			padding: 0;
			background-size: 230px 230px;
		}
	</style>
	';
}