<?php
if (!class_exists('Magazine_7_Posts_Carousel')) :
    /**
     * Adds Magazine_7_Posts_Carousel widget.
     */
    class Magazine_7_Posts_Carousel extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('m7-posts-slider-title', 'm7-posts-slider-subtitle', 'm7-posts-slider-number');
            $this->select_fields = array('m7-select-category');

            $widget_ops = array(
                'classname' => 'magazine_7_posts_carousel_widget',
                'description' => __('Displays posts carousel from selected category.', 'magazine-7'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('magazine_7_posts_carousel', __('M7 Posts Carousel', 'magazine-7'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {
            $instance = parent::m7_sanitize_data($instance, $instance);
            /** This filter is documented in wp-includes/default-widgets.php */

            $title = apply_filters('widget_title', $instance['m7-posts-slider-title'], $instance, $this->id_base);
            $subtitle = isset($instance['m7-posts-slider-subtitle']) ? $instance['m7-posts-slider-subtitle'] : '';
            $number_of_posts = 5;
            $category = isset($instance['m7-select-category']) ? $instance['m7-select-category'] : '0';

            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php if (!empty($title) || !empty($subtitle)): ?>
            <div class="em-title-subtitle-wrap">
                <?php if (!empty($title)): ?>
                    <h2 class="widget-title">
                        <span><?php echo esc_html($title); ?></span>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($subtitle)): ?>
                    <p class="em-widget-subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            <?php
            $all_posts = magazine_7_get_posts($number_of_posts, $category);
            ?>
            <div class="posts-carousel row">
                <?php
                if ($all_posts->have_posts()) :
                    while ($all_posts->have_posts()) : $all_posts->the_post();
                        global $post;

                        $thumbnail_size = 'magazine-7-medium-square';

                        ?>
                        <div class="slick-item">
                            <figure class="carousel-image col-sm-12">
                                <div class="spotlight-post" data-mh="carousal-height">
                                    <figure class="featured-article">
                                        <div class="featured-article-wrapper">
                                            <div class="data-bg-hover data-bg-featured">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ( has_post_thumbnail() ):
                                                        the_post_thumbnail($thumbnail_size);
                                                    endif;
                                                    ?>
                                                </a>

                                            </div>
                                        </div>
                                    </figure>

                                    <figcaption>
                                        <div class="figure-categories figure-categories-bg">
                                            <?php echo magazine_7_post_format($post->ID); ?>
                                            <?php magazine_7_post_categories('/'); ?>
                                        </div>
                                        <div class="title-heading">
                                            <h3 class="article-title article-title-1">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="grid-item-metadata">
                                            <?php magazine_7_post_item_meta(); ?>
                                        </div>
                                    </figcaption>
                                </div>
                                </figcaption>
                            </figure>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <?php
            //print_pre($all_posts);

            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            $categories = magazine_7_get_terms();
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::m7_generate_text_input('m7-posts-slider-title', 'Title', 'Posts Carousel');
                echo parent::m7_generate_text_input('m7-posts-slider-subtitle', 'Subtitle', 'Posts Carousel Subtitle');
                echo parent::m7_generate_select_options('m7-select-category', __('Select category', 'magazine-7'), $categories);


            }
        }
    }
endif;