<?php
if (!function_exists('magazine_7_banner_trending_posts')):
    /**
     * Ticker Slider
     *
     * @since Magazine 7 1.0.0
     *
     */
    function magazine_7_banner_trending_posts()
    {

        if ('' != magazine_7_get_option('show_trending_news_section')) { ?>
            <div class="banner-trending-posts-wrapper">

                <?php
                $category = magazine_7_get_option('select_trending_news_category');
                $number_of_posts = 5;
                $all_posts = magazine_7_get_posts($number_of_posts, $category);
                ?>
                <div class="trending-posts-carousel">
                    <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            $thumbnail_size = "thumbnail";
                            ?>
                            <div class="slick-item">
                                <figure class="carousel-image">
                                    <div class="no-gutter-col">
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

                                            <div class="title-heading">
                                                <h3 class="article-title article-title-1">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
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

            </div>
            <!-- Trending line END -->
            <?php
        }
    }
endif;

add_action('magazine_7_action_banner_trending_posts', 'magazine_7_banner_trending_posts', 10);