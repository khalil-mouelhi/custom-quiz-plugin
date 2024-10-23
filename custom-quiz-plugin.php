<?php
/*
Plugin Name: Custom Quiz Plugin
Description: A custom quiz plugin with avatar selection and certificate download.
Version: 1.0
Author: Khalil Mouelhi
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Debug logging function
function custom_quiz_debug_log($message, $data = null) {
    if (WP_DEBUG === true) {
        $log_message = "[Quiz Debug] $message";
        if ($data !== null) {
            $log_message .= ': ' . print_r($data, true);
        }
        error_log($log_message);
    }
}

// Display quiz frontend
function custom_quiz_display($atts) {
    $args = array(
        'post_type' => 'custom_quiz',
        'posts_per_page' => -1,
    );
    $quizzes = new WP_Query($args);

    ob_start();
    if ($quizzes->have_posts()) {
        include plugin_dir_path(__FILE__) . 'quiz-template.php';
    }
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('custom_quiz_display', 'custom_quiz_display');

// Enqueue admin styles
function custom_quiz_enqueue_admin_styles() {
    wp_enqueue_style('custom-quiz-admin-style', plugin_dir_url(__FILE__) . 'css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'custom_quiz_enqueue_admin_styles');

function custom_quiz_enqueue_styles() {
    wp_enqueue_style('custom-quiz-style', plugin_dir_url(__FILE__) . 'css/quiz-style.css');
}
add_action('wp_enqueue_scripts', 'custom_quiz_enqueue_styles');

//enqueue html2canvas
function enqueue_dom_to_image_script() {
    wp_enqueue_script('html2canvas', 'https://html2canvas.hertzen.com/dist/html2canvas.min.js', array(), '1.4.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_dom_to_image_script');

function enqueue_custom_quiz_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-quiz-statistics', plugin_dir_url(__FILE__) . 'js/quiz-statistics.js', array('jquery'), '1.0', true);
    
    // Localize script with AJAX URL and nonce
    wp_localize_script('custom-quiz-statistics', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('ajax-nonce') // Ensure this matches the nonce check in PHP
    ));

    // Localize script with quiz data
    $avatars = get_option('custom_quiz_avatars', array());
    wp_localize_script('custom-quiz-statistics', 'quizData', array(
        'avatars' => $avatars,
        'debug' => WP_DEBUG,
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('custom_quiz_nonce') // Ensure this matches the nonce check in PHP
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_quiz_scripts');




// Enqueue admin scripts
function enqueue_custom_quiz_admin_scripts($hook) {
    if ('custom-quiz_page_custom-quiz-avatars' !== $hook && 'custom-quiz_page_custom-quiz-statistics' !== $hook) {
        return;
    }
    wp_enqueue_script('custom-quiz-admin-script', plugin_dir_url(__FILE__) . 'js/custom-quiz-admin.js', array('jquery'), '1.0', true);
    wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', array(), '3.7.0', true);
    wp_localize_script('custom-quiz-admin-script', 'quizData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('custom_quiz_nonce')
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_custom_quiz_admin_scripts');

// Main page for the plugin
function custom_quiz_main_page() {
    echo '<div id="custom-quiz-admin">';
    echo '<h1>Custom Quiz Plugin</h1>';
    echo '<p>Welcome to the Custom Quiz Plugin. Use the menu to manage avatars and view statistics.</p>';
    echo '</div>';
}


function custom_quiz_register_post_type() {
    $labels = array(
        'name'               => _x('Custom Quizzes', 'post type general name'),
        'singular_name'      => _x('Custom Quiz', 'post type singular name'),
        'menu_name'          => _x('Custom Quizzes', 'admin menu'),
        'name_admin_bar'     => _x('Custom Quiz', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'custom quiz'),
        'add_new_item'       => __('Add New Custom Quiz'),
        'new_item'           => __('New Custom Quiz'),
        'edit_item'          => __('Edit Custom Quiz'),
        'view_item'          => __('View Custom Quiz'),
        'search_items'       => __('Search Custom Quizzes'),
        'parent_item_colon'  => __('Parent Custom Quizzes:'),
        'not_found'          => __('No custom quizzes found.'),
        'not_found_in_trash' => __('No custom quizzes found in Trash.')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'custom-quiz',
        'query_var'          => true,
        'rewrite'            => array('slug' => 'custom-quiz'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies'         => array('quiz_category'),
    );

    register_post_type('custom_quiz', $args);
}
add_action('init', 'custom_quiz_register_post_type');

function custom_quiz_plugin_menu() {
    add_menu_page('Custom Quiz', 'Custom Quiz', 'manage_options', 'custom-quiz', 'custom_quiz_main_page', 'dashicons-welcome-learn-more', 6);
    add_submenu_page('custom-quiz', 'All Quizzes', 'All Quizzes', 'manage_options', 'edit.php?post_type=custom_quiz');
    add_submenu_page('custom-quiz', 'Add New Quiz', 'Add New', 'manage_options', 'post-new.php?post_type=custom_quiz');
    add_submenu_page('custom-quiz', 'Quiz Categories', 'Categories', 'manage_options', 'edit-tags.php?taxonomy=quiz_category&post_type=custom_quiz');
    add_submenu_page('custom-quiz', 'Manage Avatars', 'Avatars', 'manage_options', 'custom-quiz-avatars', 'custom_quiz_avatars_page');
    add_submenu_page('custom-quiz', 'Quiz Statistics', 'Statistics', 'manage_options', 'custom-quiz-statistics', 'custom_quiz_statistics_page');
}
add_action('admin_menu', 'custom_quiz_plugin_menu');

function custom_quiz_register_taxonomy() {
    $labels = array(
        'name'              => _x('Quiz Categories', 'taxonomy general name'),
        'singular_name'     => _x('Quiz Category', 'taxonomy singular name'),
        'search_items'      => __('Search Quiz Categories'),
        'all_items'         => __('All Quiz Categories'),
        'parent_item'       => __('Parent Quiz Category'),
        'parent_item_colon' => __('Parent Quiz Category:'),
        'edit_item'         => __('Edit Quiz Category'),
        'update_item'       => __('Update Quiz Category'),
        'add_new_item'      => __('Add New Quiz Category'),
        'new_item_name'     => __('New Quiz Category Name'),
        'menu_name'         => __('Quiz Categories'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'quiz-category'),
    );

    register_taxonomy('quiz_category', array('custom_quiz'), $args);
}
add_action('init', 'custom_quiz_register_taxonomy', 0);




// Avatars management page
function custom_quiz_avatars_page() {
    echo '<div id="custom-quiz-admin">';
    ?>
    <h1>Manage Avatars</h1>
    <form id="custom-avatar-form" method="post" enctype="multipart/form-data">
        <h2>Upload Avatar Images</h2>
        <input type="file" name="avatar_images[]" accept="image/*" multiple required />

        <h2>Upload Icon</h2>
        <input type="file" name="avatar_icon" accept="image/*" />

        <h2>Avatar Details</h2>
        <input type="text" name="avatar_name" placeholder="Avatar Name" required />
        <input type="text" name="avatar_subtitle" placeholder="Avatar Subtitle" />
        <textarea name="avatar_description" placeholder="Avatar Description"></textarea>

        <input type="submit" name="upload_avatar" value="Upload Avatar" />
    </form>

    <h2>Uploaded Avatars</h2>
    <ul id="custom-avatar-list">
        <?php
        // Retrieve and display avatars
        $avatars = get_option('custom_quiz_avatars', array());
        foreach ($avatars as $index => $avatar) {
            echo '<li>';
            echo '<form method="post" style="display:inline; position:relative;">';
            echo '<input type="hidden" name="delete_avatar" value="' . $index . '">';
            echo '<img src="' . esc_url($avatar['images'][0]) . '" alt="' . esc_attr($avatar['name']) . '" class="avatar-image" />';
            
            if (!empty($avatar['icon'])) {
                echo '<div class="avatar-detail">Icon:</div>';
                echo '<p><img src="' . esc_url($avatar['icon']) . '" alt="Icon" style="max-width: 50px; height: auto;" /></p>';
            }
            
            echo '<div class="avatar-detail">Title:</div>';
            echo '<p>' . esc_html($avatar['name']) . '</p>';
            
            echo '<div class="avatar-detail">Subtitle:</div>';
            echo '<p>' . esc_html($avatar['subtitle']) . '</p>';
            
            echo '<div class="avatar-detail">Description:</div>';
            echo '<p>' . esc_html($avatar['description']) . '</p>';
            
            echo '<button type="button" class="remove-avatar-button">Remove Avatar</button>';
            echo '</form>';
            echo '</li>';
        }
        ?>
    </ul>
    <?php
    echo '</div>';
}


function debug_categories() {
    $categories = get_categories();
    foreach ($categories as $category) {
        error_log('Category Name: ' . $category->name . ' - Slug: ' . $category->slug . ' - ID: ' . $category->term_id);
    }
}
add_action('init', 'debug_categories');


function handle_knowledge_level() {
    if (!check_ajax_referer('ajax-nonce', 'security', false)) {
        error_log('Nonce verification failed.');
        wp_send_json_error('Nonce verification failed.');
        return;
    }

    $selected_level = isset($_POST['selected_level']) ? intval(trim($_POST['selected_level'], '.')) : null;
    error_log('Selected level: ' . $selected_level);

    // Determine the quiz name based on the selected level
    $quiz_name = '';
    if ($selected_level >= 4 && $selected_level <= 7) {
        $quiz_name = 'Quiz level 4-7';
    } elseif ($selected_level >= 8) {
        $quiz_name = 'Quiz level 8-10';
    }

    error_log('Looking for quiz: ' . $quiz_name);

    // Query for the specific quiz
    $args = array(
        'post_type' => 'custom_quiz',
        'name' => sanitize_title($quiz_name),
        'posts_per_page' => 1
    );

    $quizzes = new WP_Query($args);

    if ($quizzes->have_posts()) {
        $quizzes->the_post();
        $response = array(
            'exists' => true,
            'title' => get_the_title(),
            'id' => get_the_ID()
        );
        wp_reset_postdata();
    } else {
        $response = array(
            'exists' => false
        );
    }

    error_log('Response: ' . print_r($response, true));
    wp_send_json($response);
}

add_action('wp_ajax_handle_knowledge_level', 'handle_knowledge_level');
add_action('wp_ajax_nopriv_handle_knowledge_level', 'handle_knowledge_level');

// Handle ajax avatar upload
function custom_quiz_handle_avatar_upload_ajax() {
    check_ajax_referer('custom_quiz_nonce', 'nonce');

    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $uploadedfiles = $_FILES['avatar_images'];
    $upload_overrides = array('test_form' => false);
    $image_urls = array();

    foreach ($uploadedfiles['name'] as $key => $value) {
        if ($uploadedfiles['name'][$key]) {
            $file = array(
                'name'     => $uploadedfiles['name'][$key],
                'type'     => $uploadedfiles['type'][$key],
                'tmp_name' => $uploadedfiles['tmp_name'][$key],
                'error'    => $uploadedfiles['error'][$key],
                'size'     => $uploadedfiles['size'][$key]
            );

            $movefile = wp_handle_upload($file, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {
                $image_urls[] = $movefile['url'];
            } else {
                wp_send_json_error('Error uploading file: ' . $movefile['error']);
                return;
            }
        }
    }

    if (!empty($image_urls)) {
        $avatar_name = sanitize_text_field($_POST['avatar_name']);
        $avatar_subtitle = sanitize_text_field($_POST['avatar_subtitle']);
        $avatar_description = sanitize_textarea_field($_POST['avatar_description']);

        // Handle icon upload
        $icon_url = '';
        if (!empty($_FILES['avatar_icon']['name'])) {
            $iconfile = $_FILES['avatar_icon'];
            $icon_movefile = wp_handle_upload($iconfile, $upload_overrides);
            if ($icon_movefile && !isset($icon_movefile['error'])) {
                $icon_url = $icon_movefile['url'];
            } else {
                wp_send_json_error('Error uploading icon: ' . $icon_movefile['error']);
                return;
            }
        }

        // Save avatar data in the options table
        $avatars = get_option('custom_quiz_avatars', array());
        $avatars[] = array(
            'images' => $image_urls,
            'name' => $avatar_name,
            'subtitle' => $avatar_subtitle,
            'description' => $avatar_description,
            'icon' => $icon_url,
        );
        update_option('custom_quiz_avatars', $avatars);

        wp_send_json_success('Avatar uploaded successfully.');
    } else {
        wp_send_json_error('No files were uploaded.');
    }
}
add_action('wp_ajax_custom_quiz_upload_avatar', 'custom_quiz_handle_avatar_upload_ajax');

// Handle avatar deletion via AJAX
function custom_quiz_handle_avatar_deletion_ajax() {
    check_ajax_referer('custom_quiz_nonce', 'nonce');

    $index = intval($_POST['index']);
    $avatars = get_option('custom_quiz_avatars', array());
    if (isset($avatars[$index])) {
        unset($avatars[$index]);
        $avatars = array_values($avatars); // Re-index the array
        update_option('custom_quiz_avatars', $avatars);
        wp_send_json_success('Avatar deleted successfully.');
    } else {
        wp_send_json_error('Error: Avatar not found.');
    }
}
add_action('wp_ajax_custom_quiz_delete_avatar', 'custom_quiz_handle_avatar_deletion_ajax');

// Handle saving quiz user data
function save_quiz_user_data() {
    custom_quiz_debug_log('Entering save_quiz_user_data function');

    check_ajax_referer('custom_quiz_nonce', 'nonce');

    if (!isset($_POST['user_data'])) {
        custom_quiz_debug_log('User data is missing');
        wp_send_json_error('User data is missing');
        return;
    }

    $user_data = json_decode(stripslashes($_POST['user_data']), true);
    
    custom_quiz_debug_log('Received user data:', $user_data);

    // Sanitize and validate the data
    $sanitized_data = array(
        'device' => sanitize_text_field($user_data['device']),
        'gender' => sanitize_text_field($user_data['gender']),
        'name' => sanitize_text_field($user_data['name']),
        'knowledgeLevel' => sanitize_text_field($user_data['knowledgeLevel']),
        'avatarId' => intval($user_data['avatarId']),
        'score' => intval($user_data['score']),
        'lives' => intval($user_data['lives']),
        'actions' => array_map('sanitize_text_field', $user_data['actions']),
        'timestamp' => current_time('mysql')
    );

    custom_quiz_debug_log('Sanitized user data:', $sanitized_data);

    // Get existing quiz data or initialize an empty array
    $quiz_data = get_option('custom_quiz_user_data', array());

    // Add new user data
    $quiz_data[] = $sanitized_data;

    // Update the option in the database
    $update_result = update_option('custom_quiz_user_data', $quiz_data);

    if ($update_result) {
        custom_quiz_debug_log('User data saved successfully');
        wp_send_json_success('User data saved successfully.');
    } else {
        custom_quiz_debug_log('Failed to save user data');
        wp_send_json_error('Failed to save user data');
    }
}
add_action('wp_ajax_save_quiz_user_data', 'save_quiz_user_data');
add_action('wp_ajax_nopriv_save_quiz_user_data', 'save_quiz_user_data');

// Handle saving quiz statistics
function custom_quiz_statistics_page() {
    // Check if a bulk action is being performed
    if (isset($_POST['action']) && $_POST['action'] == 'bulk-delete') {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'bulk-quiz_statistics')) {
            wp_die('Security check failed');
        }
        $deleted = 0;
        $quiz_statistics = get_option('custom_quiz_statistics', array());
        if (isset($_POST['bulk-delete']) && is_array($_POST['bulk-delete'])) {
            foreach ($_POST['bulk-delete'] as $id) {
                $id = intval($id);
                if (isset($quiz_statistics[$id])) {
                    unset($quiz_statistics[$id]);
                
                    $deleted++;
                }
            }
            if ($deleted > 0) {
                $quiz_statistics = array_values($quiz_statistics); // Re-index the array
                update_option('custom_quiz_statistics', $quiz_statistics);
                add_settings_error('custom_quiz_messages', 'custom_quiz_message', sprintf(_n('%s item deleted.', '%s items deleted.', $deleted), $deleted), 'updated');
            }
        }
    }
    
    $quiz_statistics = get_option('custom_quiz_statistics', array());
    $total_quizzes = count($quiz_statistics);
    $average_score = $total_quizzes > 0 ? array_sum(array_column($quiz_statistics, 'percentageScore')) / $total_quizzes : 0;
    $average_time = $total_quizzes > 0 ? array_sum(array_column($quiz_statistics, 'timeSpent')) / $total_quizzes : 0;

    // Add header
    echo '<div class="quiz-statistics-header">';
    echo '<div class="quiz-statistics-header-content">';
    
    // Column 0: Quiz Statistics Headline
    echo '<div class="statistics-column headline-column">';
    echo '<h1>Quiz Statistics</h1>';
    echo '<p>Track and analyze quiz performance</p>';
    echo '</div>';
    
    // Column 1: Chart
    echo '<div class="statistics-column chart-column">';
    echo '<div id="statistics-chart-container"><canvas id="statistics-chart"></canvas></div>';
    echo '</div>';
    
    // Column 2: Summary Statistics
    echo '<div class="statistics-column summary-statistics">';
    echo '<div class="statistics-grid">';
    echo '<div class="statistic-item"><span class="statistic-value">' . $total_quizzes . '</span><span class="statistic-label">Total Quizzes</span></div>';
    echo '<div class="statistic-item"><span class="statistic-value">' . number_format($average_score, 2) . '%</span><span class="statistic-label">Average Score</span></div>';
    echo '<div class="statistic-item"><span class="statistic-value">' . format_time_spent($average_time) . '</span><span class="statistic-label">Average Time</span></div>';
    echo '</div>';
    echo '</div>';
    
    // Column 3: Export Data
    echo '<div class="statistics-column export-section">';
    echo '<h2>Export Data</h2>';
    echo '<p>Download all quiz statistics in CSV format for further analysis.</p>';
    echo '<a href="' . esc_url(add_query_arg(array('action' => 'export_quiz_statistics_csv', 'nonce' => wp_create_nonce('custom_quiz_nonce')), admin_url('admin-ajax.php'))) . '" class="page-title-action custom-button">Export as CSV</a>';
    echo '</div>';
    
    echo '</div>'; // Close quiz-statistics-header-content
    echo '</div>'; // Close quiz-statistics-header
    
    echo '<div class="wrap">';

    if (empty($quiz_statistics)) {
        echo '<p>No quiz statistics available yet.</p>';
    } else {
        ?>
        <form method="post">
            <?php
            wp_nonce_field('bulk-quiz_statistics');
            $quiz_statistics_table = new Quiz_Statistics_List_Table($quiz_statistics);
            $quiz_statistics_table->prepare_items();
            $quiz_statistics_table->display();
            ?>
        </form>
        <?php
    }

    echo '</div>';

    // Add JavaScript for toggling details, CSV export, delete functionality, and chart
    ?>
    <style>
    .quiz-statistics-header {
        background-color: #ffffff;
        padding: 90px 20px 90px 20px;
        margin-bottom: 20px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
		border-radius: 8px;
    }
    .quiz-statistics-header-content {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
       
        margin: 0 auto;
    }
    .statistics-column {
        flex: 1;
        padding: 0 15px;
		max-width:350px;
    }
    .headline-column {
        flex: 0 0 400px;
    }
    .chart-column {
        flex: 0 0 250px;
    }
    .quiz-statistics-header h1 {
        margin: 0 0 10px;
        color: #23282d;
        font-size: 24px;
    }
    .quiz-statistics-header p {
        margin: 0;
        color: #666;
		padding-bottom: 15px;
    }
    .statistics-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .statistic-label {
        display: block;
        margin-top: 15px;
        font-size: 13px;
    }
    .statistic-value {
        font-size: 24px;
        font-weight: bold;
    }
    #statistics-chart-container {
        width: 100%;
        height: 250px;
    }
    .custom-button, .button {
        background-color: #82C800 !important;
        border-radius: 12px !important;
        color: white !important;
        border: none !important;
        padding: 6px 12px !important;
        text-decoration: none !important;
        display: inline-block !important;
        cursor: pointer !important;
    }
    </style>
    <script>
    jQuery(document).ready(function($) {
        // Toggle details
        $(document).on('click', '.toggle-details', function(e) {
            e.preventDefault();
            var index = $(this).data('index');
            var detailsRow = $('#details-' + index);
            
            if (detailsRow.length) {
                detailsRow.toggle();
                $(this).text(detailsRow.is(':visible') ? 'Hide Details' : 'Show Details');
            } else {
                var row = $(this).closest('tr');
                var columns = row.find('td').length;
                var newRow = $('<tr id="details-' + index + '" class="quiz-details"></tr>');
                var detailsCell = $('<td colspan="' + columns + '"></td>');
                
                // AJAX call to fetch details
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'get_quiz_details',
                        nonce: quizData.nonce,
                        index: index
                    },
                    success: function(response) {
                        if (response.success) {
                            detailsCell.html(response.data);
                            newRow.append(detailsCell);
                            row.after(newRow);
                            $(e.target).text('Hide Details');
                        } else {
                            alert('Error loading details: ' + response.data);
                        }
                    },
                    error: function() {
                        alert('An error occurred while loading the details.');
                    }
                });
            }
        });

        // Delete result
        $(document).on('click', '.delete-result', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this quiz result?')) {
                var index = $(this).data('index');
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'delete_quiz_result',
                        nonce: quizData.nonce,
                        index: index
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Quiz result deleted successfully.');
                            location.reload();
                        } else {
                            alert('Error deleting quiz result: ' + response.data);
                        }
                    },
                    error: function() {
                        alert('An error occurred while deleting the quiz result.');
                    }
                });
            }
        });

        // Create pie chart
        var ctx = document.getElementById('statistics-chart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Correct', 'Incorrect'],
                datasets: [{
                    data: [<?php echo $average_score; ?>, <?php echo 100 - $average_score; ?>],
                    backgroundColor: ['#82C800', '#FF6B6B']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
    </script>
    <?php
}
// Helper function to format time spent
function format_time_spent($seconds) {
    $minutes = floor($seconds / 60);
    $remaining_seconds = $seconds % 60;
    if ($minutes == 0) {
        return $remaining_seconds . ' second' . ($remaining_seconds != 1 ? 's' : '');
    }
    return $minutes . ' minute' . ($minutes != 1 ? 's' : '') . ' ' . $remaining_seconds . ' second' . ($remaining_seconds != 1 ? 's' : '');
}

// Export quiz statistics as CSV
function export_quiz_statistics_csv() {
    check_admin_referer('custom_quiz_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    $quiz_statistics = get_option('custom_quiz_statistics', array());

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="quiz_statistics.csv"');

    $output = fopen('php://output', 'w');

    // CSV headers
    fputcsv($output, array(
        'Date', 'Name', 'Knowledge Level', 'Avatar', 'Device', 'Gender',
        'Total Questions', 'Correct Answers', 'Incorrect Answers', 'Score',
        'Time Spent', 'Lives Remaining'
    ));

    foreach ($quiz_statistics as $stat) {
        $completion_date = isset($stat['completionDate']) && !empty($stat['completionDate']) 
            ? date('Y-m-d H:i:s', strtotime($stat['completionDate'])) 
            : date('Y-m-d H:i:s');
        $percentage_score = isset($stat['percentageScore']) ? number_format($stat['percentageScore'], 2) : 'N/A';

        fputcsv($output, array(
            $completion_date,
            $stat['userName'],
            $stat['knowledgeLevel'],
            $stat['avatarName'],
            $stat['device'],
            $stat['gender'],
            $stat['totalQuestions'],
            $stat['correctAnswers'],
            $stat['incorrectAnswers'],
            $percentage_score . '%',
            format_time_spent($stat['timeSpent']),
            $stat['livesRemaining']
        ));
    }

    fclose($output);
    exit;
}
add_action('wp_ajax_export_quiz_statistics_csv', 'export_quiz_statistics_csv');

// Delete quiz result
function delete_quiz_result() {
    check_ajax_referer('custom_quiz_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error('You do not have permission to delete quiz results.');
        return;
    }

    $index = isset($_POST['index']) ? intval($_POST['index']) : -1;

    if ($index < 0) {
        wp_send_json_error('Invalid index provided.');
        return;
    }

    $quiz_statistics = get_option('custom_quiz_statistics', array());

    if (isset($quiz_statistics[$index])) {
        unset($quiz_statistics[$index]);
        $quiz_statistics = array_values($quiz_statistics); // Re-index the array
        update_option('custom_quiz_statistics', $quiz_statistics);
        wp_send_json_success('Quiz result deleted successfully.');
    } else {
        wp_send_json_error('Quiz result not found.');
    }
}
add_action('wp_ajax_delete_quiz_result', 'delete_quiz_result');

// Add this new function to handle AJAX requests for quiz details
function get_quiz_details() {
    check_ajax_referer('custom_quiz_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error('You do not have permission to view quiz details.');
        return;
    }

    $index = isset($_POST['index']) ? intval($_POST['index']) : -1;

    if ($index < 0) {
        wp_send_json_error('Invalid index provided.');
        return;
    }

    $quiz_statistics = get_option('custom_quiz_statistics', array());

    if (isset($quiz_statistics[$index])) {
        $stat = $quiz_statistics[$index];
        $details = '<h4>Detailed Responses:</h4>';
        $details .= '<table class="wp-list-table widefat fixed striped">';
        $details .= '<thead><tr><th>Question</th><th>User Answer</th><th>Correct?</th><th>Explanation</th></tr></thead>';
        $details .= '<tbody>';
        foreach ($stat['detailedResponses'] as $response) {
            $details .= '<tr>';
            $details .= '<td>' . esc_html($response['question']) . '</td>';
            $details .= '<td>' . esc_html($response['userAnswer']) . '</td>';
            $details .= '<td>' . ($response['isCorrect'] ? 'Yes' : 'No') . '</td>';
            $details .= '<td>' . esc_html($response['explanation']) . '</td>';
            $details .= '</tr>';
        }
        $details .= '</tbody></table>';

        wp_send_json_success($details);
    } else {
        wp_send_json_error('Quiz details not found.');
    }
}
add_action('wp_ajax_get_quiz_details', 'get_quiz_details');

// Custom List Table for Quiz Statistics
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Quiz_Statistics_List_Table extends WP_List_Table {
    private $quiz_statistics;

    public function __construct($quiz_statistics) {
        parent::__construct(array(
            'singular' => 'quiz_statistic',
            'plural'   => 'quiz_statistics',
            'ajax'     => false
        ));
        $this->quiz_statistics = $quiz_statistics;
    }

    public function get_columns() {
        return array(
            'cb'              => '<input type="checkbox" />',
            'completionDate'  => 'Date',
            'userName'        => 'Name',
            'knowledgeLevel'  => 'Knowledge Level',
            'avatarName'      => 'Avatar',
            'device'          => 'Device',
            'gender'          => 'Gender',
            'totalQuestions'  => 'Total Questions',
            'correctAnswers'  => 'Correct Answers',
            'incorrectAnswers'=> 'Incorrect Answers',
            'percentageScore' => 'Score',
            'timeSpent'       => 'Time Spent',
            'livesRemaining'  => 'Lives Remaining',
            'actions'         => 'Actions'
        );
    }

    public function get_sortable_columns() {
        return array(
            'completionDate'  => array('completionDate', true),
            'userName'        => array('userName', false),
            'knowledgeLevel'  => array('knowledgeLevel', false),
            'percentageScore' => array('percentageScore', false),
            'timeSpent'       => array('timeSpent', false)
        );
    }

    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $per_page = 20;
        $current_page = $this->get_pagenum();
        $total_items = count($this->quiz_statistics);

        // Sort items
        usort($this->quiz_statistics, array($this, 'usort_reorder'));

        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page'    => $per_page
        ));

        $this->items = array_slice($this->quiz_statistics, (($current_page-1) * $per_page), $per_page);
    }

    protected function usort_reorder($a, $b) {
        $orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'completionDate';
        $order = (!empty($_GET['order'])) ? $_GET['order'] : 'desc';
        $result = strcmp($a[$orderby], $b[$orderby]);
        return ($order === 'asc') ? $result : -$result;
    }

    public function column_default($item, $column_name) {
        switch ($column_name) {
            case 'completionDate':
                return date('Y-m-d H:i:s', strtotime($item[$column_name]));
            case 'percentageScore':
                return number_format($item[$column_name], 2) . '%';
            case 'timeSpent':
                return format_time_spent($item[$column_name]);
            case 'actions':
                return sprintf(
                    '<button class="button toggle-details custom-button" data-index="%s">Show Details</button>',
                    array_search($item, $this->quiz_statistics)
                );
            default:
                return isset($item[$column_name]) ? $item[$column_name] : '';
        }
    }

    public function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />',
            array_search($item, $this->quiz_statistics)
        );
    }

    public function get_bulk_actions() {
        return array(
            'bulk-delete' => 'Delete'
        );
    }

    protected function handle_row_actions($item, $column_name, $primary) {
        if ($primary !== $column_name) {
            return '';
        }

        $actions = array();
        $index = array_search($item, $this->quiz_statistics);

        $actions['delete'] = sprintf(
            '<a href="#" class="delete-result" data-index="%s">Delete</a>',
            $index
        );

        return $this->row_actions($actions);
    }
}