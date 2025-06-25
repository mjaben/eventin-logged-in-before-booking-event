function restrict_eventin_checkout_page() {
    // Get the current page URL
    $current_url = home_url(add_query_arg([], $_SERVER['REQUEST_URI']));

    // Define the restricted page URL
    $restricted_url = home_url('/eventin-purchase/checkout/');

    // Check if the current URL matches the restricted URL
    if ($current_url === $restricted_url && !is_user_logged_in()) {
        // Redirect unauthorized users to the login page (or any other page)
        wp_redirect(wp_login_url($restricted_url));
        exit;
    }
}
add_action('template_redirect', 'restrict_eventin_checkout_page');
