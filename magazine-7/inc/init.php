<?php
/**
 * Load libraries.
 */
require_once  get_template_directory()  . '/lib/tgm/class-tgm-plugin-activation.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets/widgets-init.php';

/**
 * Load Init for Hook files.
 */
require get_template_directory() . '/inc/hooks/hooks-init.php';

 /**
 * admin dashboard
 */
require get_template_directory() . '/admin-dashboard/admin_dashboard.php';

/**
 * Theme review.
 */
require get_template_directory().'/inc/review.php';

/**
 * Theme review.
 */
// require get_template_directory().'/inc/upgrade.php';

/**
 * Load info.
 */

 
if ( is_admin() ) {
    //require get_template_directory().'/lib/info/class.info.php';
    //require get_template_directory().'/lib/info/info.php';
}