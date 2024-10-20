<?php
/**
 * Recommended plugins
 *
 * @package Magazine 7
 */

if ( ! function_exists( 'magazine_7_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function magazine_7_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'AF Companion', 'magazine-7' ),
                'slug'     => 'af-companion',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Elespare', 'magazine-7' ),
                'slug'     => 'elespare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Blockspare', 'magazine-7' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Latest Posts Block', 'magazine-7' ),
                'slug'     => 'latest-posts-block-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Magic Content Box', 'magazine-7' ),
                'slug'     => 'magic-content-box-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'magazine-7' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Free Live Chat using 3CX', 'magazine-7' ),
                'slug'     => 'wp-live-chat-support',
                'required' => false,
                 
            ),
            array(
                'name'     => esc_html__( 'Woo Product Showcase', 'magazine-7' ),
                'slug'     => 'woo-product-showcase',
                'required' => false,
            )          
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'magazine_7_recommended_plugins' );
