<?php function rappearls_styles() {
    wp_enqueue_style('rappearls-variables', get_template_directory_uri() . '/assets/css/variables.css');
    wp_enqueue_style('rappearls-style', get_stylesheet_uri());
    wp_enqueue_style('rappearls-components', get_template_directory_uri() . '/assets/css/components.css');
    
    if (is_singular('artiste')) {
        wp_enqueue_style('rappearls-single-artiste', get_template_directory_uri() . '/assets/css/single-artiste.css');
    }
    
    if (is_singular('album')) {
        wp_enqueue_style('rappearls-single-album', get_template_directory_uri() . '/assets/css/single-album.css');
    }
    
    if (is_post_type_archive('artiste')) {
        wp_enqueue_style('rappearls-archive-artiste', get_template_directory_uri() . '/assets/css/archive-artiste.css');
    }
    
    if (is_post_type_archive('album') || is_tax('genre')) {
        wp_enqueue_style('rappearls-archive-album', get_template_directory_uri() . '/assets/css/archive-album.css');
    }
}
add_action('wp_enqueue_scripts', 'rappearls_styles');

function rappearls_menus() {
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'rappearls'),
            'footer-menu' => esc_html__('Footer Menu', 'rappearls'),
        )
    );
}
add_action('after_setup_theme', 'rappearls_menus');

?>