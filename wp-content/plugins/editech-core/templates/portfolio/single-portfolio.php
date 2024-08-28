<?php

/**
 * The template for displaying product content in the single-osf_portfolio.php template
 *
 * This template can be overridden by copying it to yourtheme/single-osf_portfolio.php.
 *
 */
defined('ABSPATH') || exit;

$post_class = 'osf-portfolio osf-portfolio-single';

get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                /* Start the Loop */
                while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
                        <div class="portfolio-inner">

                            <header class="entry-header">
                                <div class="entry-category"><?php echo OSF_Custom_Post_Type_Portfolio::getInstance()->get_term_portfolio(get_the_ID()); ?></div>
                            </header><!-- .entry-header -->

                            <figure class="portfolio-thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </figure><!-- .post-thumbnail -->
                            <div class="portfolio-wrap">
                                <div id="portfolio-primary" class="portfolio-left">


                                    <div class="entry-content">
                                        <?php
                                        the_content(
                                            sprintf(
                                            /* translators: %s: Post title. */
                                                __('<span>%1$s</span><span class="screen-reader-text"> "%2$s"</span> <i class="opal-icon-arrow-right" aria-hidden="true"></i>', 'editech-core'),
                                                esc_html__('Read more', 'editech-core'),
                                                get_the_title()
                                            )
                                        );

                                        wp_link_pages(array(
                                            'before'      => '<div class="page-links">' . esc_html__('Pages:', 'editech-core'),
                                            'after'       => '</div>',
                                            'link_before' => '<span class="page-number">',
                                            'link_after'  => '</span>',
                                        ));

                                        ?>

                                    </div><!-- .entry-content -->
                                </div>

                                <aside id="portfolio-secondary" class="widget-area" role="complementary">
                                    <div class="inner">
                                        <?php
                                        get_template_part('template-parts/portfolio/content', 'info');
                                        dynamic_sidebar('sidebar-portfolio');
                                        ?>
                                    </div>
                                </aside><!-- #secondary -->

                            </div> <!-- #portfolio-wrap-->
                        </div><!-- .entry-inner -->
                    </article><!-- #post-<?php the_ID(); ?> -->

                <?php endwhile; // End of the loop.
                ?>
            </main> <!-- #main -->
        </div> <!-- #primary -->

    </div><!-- .wrap -->

<?php get_footer();
