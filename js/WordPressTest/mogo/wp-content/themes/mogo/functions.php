<?php

add_action( 'wp_enqueue_scripts', function() {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/styles/style.css' );
	

	wp_enqueue_script('font-loader', get_template_directory_uri() . '/assets/js/font-loader.js', array('jquery'), 'null', true);
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('all', get_template_directory_uri() . '/assets/js/all.js', array('jquery'), 'null', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 'null', true);
	
	// <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
 
});

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-log');


add_filter( 'show_admin_bar', '__return_false' );

function register_my_menus() {
	register_nav_menus(array(
			'primary' => __( 'Primary Menu' )
	));
}
add_action( 'init', 'register_my_menus' );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			$classes = empty($item->classes) ? array() : (array) $item->classes;
			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
			$class_names = esc_attr($class_names);
			$output .= '<li class="header_menu_item ' . $class_names . '">';
			$attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . ' class="header_menu_link">';
			$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}
// Добавляем секцию и контроллеры в кастомизатор темы
function theme_customizer_settings($wp_customize) {
	// Секция для настроек фонового изображения
	$wp_customize->add_section('theme_background_image_section', array(
			'title' => __('Background Image', 'your-theme'),
			'priority' => 30,
	));

	// Контроллер для фонового изображения
	$wp_customize->add_setting('theme_background_image', array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_background_image_control', array(
			'label' => __('Background Image', 'your-theme'),
			'section' => 'theme_background_image_section',
			'settings' => 'theme_background_image',
	)));

	// Контроллер для заголовка
	$wp_customize->add_setting('theme_header_title', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('theme_header_title_control', array(
			'label' => __('Header Title', 'your-theme'),
			'section' => 'title_tagline',
			'settings' => 'theme_header_title',
	));

	// Контроллер для подзаголовка
	$wp_customize->add_setting('theme_header_subtitle', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('theme_header_subtitle_control', array(
			'label' => __('Header Subtitle', 'your-theme'),
			'section' => 'title_tagline',
			'settings' => 'theme_header_subtitle',
	));
}
add_action('customize_register', 'theme_customizer_settings');

add_filter('acf/settings/remove_wp_meta_box', '__return_false', 20);

//Team Section
function create_team_post_type() {
	register_post_type('team',
			array(
					'labels' => array(
							'name' => __('Team'),
							'singular_name' => __('Team Member'),
							'add_new' => __('Add New Member'),
							'add_new_item' => __('Add New Team Member'),
							'edit_item' => __('Edit Team Member'),
							'new_item' => __('New Team Member'),
							'view_item' => __('View Team Member'),
							'search_items' => __('Search Team Members'),
							'not_found' => __('No Team Members found'),
							'not_found_in_trash' => __('No Team Members found in Trash'),
					),
					'public' => true,
					'has_archive' => true,
					'supports' => array('title', 'editor', 'thumbnail'),
					'menu_icon' => 'dashicons-groups',
			)
	);
}
add_action('init', 'create_team_post_type');
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
			'page_title' => 'Team Section Settings',
			'menu_title' => 'Team Settings',
			'menu_slug' => 'team-settings',
			'capability' => 'edit_posts',
			'redirect' => false
	));
}
function create_testimonials_post_type() {
	register_post_type('testimonials',
			array(
					'labels' => array(
							'name' => __('Testimonials'),
							'singular_name' => __('Testimonial'),
							'add_new' => __('Add New Testimonial'),
							'add_new_item' => __('Add New Testimonial'),
							'edit_item' => __('Edit Testimonial'),
							'new_item' => __('New Testimonial'),
							'view_item' => __('View Testimonial'),
							'search_items' => __('Search Testimonials'),
							'not_found' => __('No Testimonials found'),
							'not_found_in_trash' => __('No Testimonials found in Trash'),
					),
					'public' => true,
					'has_archive' => true,
					'supports' => array('title', 'editor', 'thumbnail'),
					'menu_icon' => 'dashicons-testimonial',
			)
	);
}
add_action('init', 'create_testimonials_post_type');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
			'page_title' => 'Testimonials Section Settings',
			'menu_title' => 'Testimonials Settings',
			'menu_slug' => 'testimonials-settings',
			'capability' => 'edit_posts',
			'redirect' => false
	));
}
function create_blog_post_type() {
	register_post_type('blog',
			array(
					'labels' => array(
							'name' => __('Blogs'),
							'singular_name' => __('Blog')
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'blog'),
					'supports' => array('title', 'editor', 'thumbnail')
			)
	);
}
add_action('init', 'create_blog_post_type');
?>

