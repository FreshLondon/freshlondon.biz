<?

/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FreshLondon
 */
if ( !function_exists( 'freshlondon_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the aftercomponentsetup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function freshlondon_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on components, use a find and replace
         * to change 'freshlondon' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'freshlondon', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'freshlondon-featured-image', 940, 9999 );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Top', 'freshlondon' ),
        ) );

        /**
         * Add support for core custom logo.
         */
        add_theme_support( 'custom-logo', array(
            'height' => 200,
            'width' => 200,
            'flex-width' => true,
            'flex-height' => true,
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'freshlondon_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }

endif;
add_action( 'after_setup_theme', 'freshlondon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function freshlondon_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'freshlondon_content_width', 940 );
}

add_action( 'after_setup_theme', 'freshlondon_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function freshlondon_the_custom_logo() {
    if ( !function_exists( 'the_custom_logo' ) ) {
        return;
    } else {
        the_custom_logo();
    }
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function freshlondon_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Sidebar', 'freshlondon' ),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}

add_action( 'widgets_init', 'freshlondon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function freshlondon_scripts() {

    //styles
    wp_enqueue_style( 'styles', get_stylesheet_uri(), array(), time(), false );
    wp_enqueue_style( 'freshlondon-styles', get_template_directory_uri() . '/assets/app/dist/freshlondon-styles.css', array( 'styles' ), time(), 'screen' );
    wp_enqueue_style( 'fa-icons', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array( 'freshlondon-styles' ), '5.6.3', 'screen' );
    //    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/dist/owl.carousel.min.css', array('freshlondon-styles'), false, 'screen');
    //    wp_enqueue_style('owl-carousel-theme', get_template_directory_uri() . '/assets/dist/owl.theme.default.min.css', array('freshlondon-styles'), false, 'screen');

    //scripts
    wp_enqueue_script( 'js-jquery', get_template_directory_uri() . '/assets/app/dist/jquery.min.js', false, '3.5.1', false );
    wp_enqueue_script( 'js-header', get_template_directory_uri() . '/assets/app/dist/header.js', array( 'js-jquery' ), time(), false );
    wp_enqueue_script( 'js-footer', get_template_directory_uri() . '/assets/app/dist/footer.js', false, time(), false );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'freshlondon_scripts', 100 );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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

// Changing excerpt length
function new_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_length', 'new_excerpt_length' );

// Changing excerpt more
function new_excerpt_more( $more ) {
    global $post;
    #return '<a href="'. get_permalink($post->ID) . '" class="excerpt-read-more">' . 'Read more' . '</a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


/**
 * Remove bullshit smiley compatibility.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Custom post types.
 */
function create_posttype() {
    register_post_type( 'portfolio', array(
            'labels' => array(
                'name' => __( 'Portfolio' ),
                'singular_name' => __( 'Portfolio' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'portfolio' ),
        )
    );
}

add_action( 'init', 'create_posttype' );

/**
 * DEBUGGING
 */
if ( !function_exists( 'debug' ) ) {
    function debug( $data ) {
        print( '<pre>' );
        print_r( $data );
        print( '</pre>' );
    }
}