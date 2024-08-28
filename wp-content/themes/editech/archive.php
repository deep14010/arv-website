<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <?php
                if (have_posts()) : ?>

                    <?php if (get_the_archive_description()): ?>
                        <header class="page-header">
                            <?php
                            the_archive_title('<h2 class="page-title screen-reader-text">', '</h2>');
                            the_archive_description('<div class="taxonomy-description">', '</div>');
                            ?>
                        </header><!-- .page-header -->
                    <?php endif; ?>


                    <?php
                    get_template_part('template-parts/post');

                    the_posts_pagination(array(
                        'prev_text'          => '<span class="opal-icon-angle-left"></span><span>' . esc_html__('Previous', 'editech') . '</span>',
                        'next_text'          => '<span>' . esc_html__('Next', 'editech') . '</span><span class="opal-icon-angle-right"></span>',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'editech') . ' </span>',
                    ));
                else :
                    get_template_part('template-parts/post/content', 'none');

                endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
