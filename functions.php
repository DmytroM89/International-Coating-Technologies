<?php
/**
* Чистый Шаблон для разработки
* Функции шаблона
* @package WordPress
* @subpackage clean
*/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
add_filter('show_admin_bar', '__return_false');
add_theme_support('post-thumbnails');

// Add menu
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

// Add widget
function my_widgets_init()
{
	register_sidebar(array(
		'name' => 'Языковой переключатель',
		'id' => 'lang',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
}
add_action('widgets_init', 'my_widgets_init');


// Style
function my_theme_enqueue_style()
{
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css');
	wp_enqueue_style('mfp', get_template_directory_uri() . '/assets/css/magnific-popup.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.min.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_style');

//// Scripts
//function my_theme_add_scripts()
//{
////	wp_enqueue_script('my-j2', get_template_directory_uri() . '/assets/js/earth/jquery-1.7.2.min.js', '', '', true);
//
//}
//add_action('wp_enqueue_scripts', 'my_theme_add_scripts');

wp_deregister_script('jquery');//отключаем стандартный jquery
add_action('wp_enqueue_scripts', 'add_my_scripts');//когда происходит инициализация скриптов, запускаем свою функцию для подключения доп скриптов
function add_my_scripts() {
	$path = get_bloginfo('template_directory') . "/";//получаем путь к выбранной теме
	if (!is_admin()) {//это означает, что в админке не нужно подключать и заменять jquery так как может нарушится встроенный функционал
		wp_deregister_script('jquery');//отключаем стандартный jquery
		wp_register_script('jquery', ($path . "/assets/js/jquery-3.2.1.min.js"), false, '3.2.1');//прописываем свой путь к своему jquery
		wp_enqueue_script('jquery');//Подключаем jquery
	}
	//дальше подключаем еще нужные скрипты, но уже 2 строками. myJS это id скрипта для wordpress. Есть уже зарезервированные имена такие как jquery. Поэтому для jquery используется wp_deregister_script
//	wp_enqueue_script('my-j', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js', '', '', true);
	wp_enqueue_script('earth-req', get_template_directory_uri() . '/assets/js/earth/requestanimationframe.polyfill.js', '', '', true);
	wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/js/earth/jquery-ui.min.js', '', '', true);
	wp_enqueue_script('sphere', get_template_directory_uri() . '/assets/js/earth/sphere-hacked.js', '', '', true);
	wp_enqueue_script('earth-3d', get_template_directory_uri() . '/assets/js/earth/jquery.earth-3d.js', '', '', true);
	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js', '', '', true);
	wp_enqueue_script('mfp', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', '', '', true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/main.min.js', '', '', true);
}

function remove_menus(){
	global $menu;
	$restricted = array(
		__('Dashboard'),
		__('Posts'),
		__('Media'),
		__('Links'),
//		__('Pages'),
		__('Appearance'),
		__('Tools'),
		__('Users'),
		__('Settings'),
		__('Comments'),
		__('Plugins')
	);
	end ($menu);
	while (prev($menu)){
		$value = explode(' ', $menu[key($menu)][0]);
		if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
			unset($menu[key($menu)]);
		}
	}
	remove_menu_page('edit.php?post_type=acf');
    remove_menu_page('themes.php');
}
add_action('admin_menu', 'remove_menus', 999);
