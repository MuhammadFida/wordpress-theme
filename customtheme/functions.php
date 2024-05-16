<?php




function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


// Check for updates
function my_theme_check_updates() {
    $current_version = '1.0'; // Current version of the theme
    $latest_version = '1.1'; // Latest version fetched from your update endpoint
    
    if (version_compare($current_version, $latest_version, '<')) {
        // Newer version available, initiate update
        my_theme_do_update();
    }
}

// Perform update
function my_theme_do_update() {
    // Download and replace theme files with updated files
    // Be sure to handle security checks and error handling
    // Example:
    $update_files = ['path/to/updated/file1.php', 'path/to/updated/file2.php'];
    foreach ($update_files as $file) {
        // Download the file and replace the existing file
    }
    
    // Log the update activity
    // Example:
    error_log('Theme updated to version 1.1');
    
    // Notify the user
    // Example:
    wp_mail('admin@example.com', 'Theme Update', 'The theme has been updated to version 1.1');
}

// Hook into an appropriate action to trigger update check
add_action('init', 'my_theme_check_updates');


// Hook into admin_init to check for updates
add_action('admin_init', 'my_theme_check_updates');



// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );

 // Register a new navigation menu
 function add_Main_Nav() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  // Hook to the init action hook, run our navigation menu function
  add_action( 'init', 'add_Main_Nav' );

  




?>