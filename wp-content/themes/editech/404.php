<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php if (get_theme_mod('osf_page_404_page_enable') != 'default' && !empty(get_theme_mod('osf_page_404_page_custom'))): ?>
                    <?php $query = new WP_Query('page_id=' . get_theme_mod('osf_page_404_page_custom'));
                    if ($query->have_posts()):
                        while ($query->have_posts()) : $query->the_post();
                            the_content();
                        endwhile;
                    endif; ?>
                <?php else: ?>
                    <section class="error-404 not-found">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-5 col-12">
                                    <div class="error-404-img mt-4 text-center">
                                        <img src="<?php echo esc_url(get_parent_theme_file_uri('/assets/images/img-404.png')) ?>" title="404">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-12">
                                    <div class="error-404-content text-center">
                                        <h2 class="error-title p-0 m-0">
                                            <span class="screen-reader-text"><?php esc_html_e('404', 'editech'); ?></span>
                                            <img src="<?php echo esc_url(get_parent_theme_file_uri('/assets/images/404.png')) ?>" title="404">
                                        </h2>

                                        <h3 class="error-subtitle p-0 m-0">
                                            <?php esc_html_e('Sorry! Page Not Found!', 'editech'); ?>
                                        </h3>

                                        <div class="error-text">
                                            <div class="error-text-des mb-4"><?php esc_html_e("Oops! The page which you are looking for does not exist. Please return to the homepage.", 'editech') ?></div>
                                            <a href="<?php echo esc_url(home_url('/')); ?>"
                                               class="return-home button-primary"><?php esc_html_e('Back to home', 'editech'); ?></a>
                                            <a href="javascript: history.go(-1)"
                                               class="go-back button-secondary"><?php esc_html_e('Previous page', 'editech'); ?></a>

                                        </div>
                                    </div>
                                </div><!-- .page-content -->
                            </div>
                        </div>
                    </section><!-- .error-404 -->
                <?php endif; ?>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->
<?php get_footer();
