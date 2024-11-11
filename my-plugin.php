<?php

/**
 * Plugin Name: My Plugin
 * Plugin URI: --
 * Description: My First Plugin for WP
 * Version: 1.1
 * Author: Manoj
 * Author URI: --
 * License: GPL2
 */

 function slf_enqueue_styles() {
    wp_enqueue_style('slf-custom-styles', plugin_dir_url(__FILE__) . 'style.css');
}
add_action('wp_enqueue_scripts', 'slf_enqueue_styles');

function slf_login_form() {
    if (is_user_logged_in()) {
        return '<p>You are already logged in.</p>';
    }

    // Display error message if there is one
    $error = get_transient('slf_login_error');
    delete_transient('slf_login_error'); // Clear the error after displaying it
    $output = $error ? '<p style="color:red;">' . esc_html($error) . '</p>' : '';

   
    $output .= '<form method="post" action="' . esc_url($_SERVER['REQUEST_URI']) . '">';
    $output .= wp_nonce_field('slf_login_action', 'slf_login_nonce');
    $output .= '<p><label for="username">Username</label><br>';
    $output .= '<input type="text" name="username" required></p>';
    $output .= '<p><label for="password">Password</label><br>';
    $output .= '<input type="password" name="password" required></p>';
    $output .= '<p><input type="submit" name="submit" value="Login"></p>';
    $output .= '</form>';

    return $output;
}

function slf_handle_login() {
    if (isset($_POST['submit'])) {
    
        if (!isset($_POST['slf_login_nonce']) || !wp_verify_nonce($_POST['slf_login_nonce'], 'slf_login_action')) {
            set_transient('slf_login_error', 'Nonce verification failed.', 5);
            return;
        }

        $username = sanitize_user($_POST['username']);
        $password = sanitize_text_field($_POST['password']);
        
        $credentials = array(
            'user_login' => $username,
            'user_password' => $password,
            'remember' => true
        );

        $user = wp_signon($credentials, false);

        if (is_wp_error($user)) {
            set_transient('slf_login_error', 'Login failed: ' . $user->get_error_message(), 5);
        } else {
            wp_redirect(home_url());
            exit;
        }
    }
}
add_action('init', 'slf_handle_login');

function slf_login_shortcode() {
    return slf_login_form();
}
add_shortcode('simple_login', 'slf_login_shortcode');
