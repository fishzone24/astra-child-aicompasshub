<?php
/**
 * Astra Child AICompassHub Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child AICompassHub
 */

// 署名和说明
echo <<<EOF

    __   _         _                                  ___    _  _   
  / _| (_)       | |                                  |__ \  | || |  
 | |_   _   ___  | |__    ____   ___    _ __     ___     ) | | || |_ 
 |  _| | | / __| | '_ \  |_  /  / _ \  | '_ \   / _ \   / /  |__   _|
 | |   | | \__ \ | | | |  / /  | (_) | | | | | |  __/  / /_     | |  
 |_|   |_| |___/ |_| |_| /___|  \___/  |_| |_|  \___| |____|    |_|  
                                                                     
                                                                     

EOF;
echo "==================================================================\n";
echo "AICompassHub 节点一键管理脚本\n"; // Modified Project Name
echo "脚本作者: fishzone24 - 推特: https://x.com/fishzone24\n";
echo "此脚本为免费开源脚本，如有问题请提交 issue\n";
echo "==================================================================\n";

/**
 * Enqueue scripts and styles.
 */
function astra_child_aicompasshub_enqueue_styles() {

    // Enqueue the parent theme stylesheet first.
	wp_enqueue_style( 'astra-theme-css', get_template_directory_uri() . '/style.css' );

    // Enqueue the child theme stylesheet.
    // Ensure it has the parent theme stylesheet as a dependency.
    // The version number is set to the file modification time to help with cache busting during development.
	wp_enqueue_style( 'astra-child-aicompasshub-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array( 'astra-theme-css' ), 
        filemtime( get_stylesheet_directory() . '/style.css' )
    );

    // Enqueue the theme toggle script.
    wp_enqueue_script( 'astra-child-aicompasshub-theme-toggle', 
        get_stylesheet_directory_uri() . '/js/theme-toggle.js',
        array(), // No dependencies
        filemtime( get_stylesheet_directory() . '/js/theme-toggle.js' ),
        true // Load in footer
    );

}
add_action( 'wp_enqueue_scripts', 'astra_child_aicompasshub_enqueue_styles' );

/**
 * Add custom functionalities below this line.
 */

// Remove the direct echo of authorship info as it can break layouts
// echo statements removed for better practice. Authorship is in style.css header.

// Example: Add a body class for dark mode - This JS now handles adding the class
/*
function aicompasshub_add_dark_mode_body_class( $classes ) {
    // Javascript now handles adding/removing the .dark-mode class dynamically
    // based on localStorage or system preference.
    return $classes;
}
// add_filter( 'body_class', 'aicompasshub_add_dark_mode_body_class' ); // No longer needed if JS handles it
*/

// Function to add the toggle button to the header (Example: using astra_masthead_content hook)
function aicompasshub_add_dark_mode_toggle_button() {
    // Basic button HTML. You might want to style this further or use an SVG icon.
    echo '<button id="dark-mode-toggle" class="theme-toggle-button" aria-label="Toggle dark mode" aria-pressed="false"></button>';
}
// Choose a suitable hook to add the button. 'astra_masthead_content' adds it inside the header.
// Other options: 'astra_header_after', or place it manually in a copied header.php template.
add_action( 'astra_masthead_content', 'aicompasshub_add_dark_mode_toggle_button', 15 );

?> 