<article id="post-<?php the_ID(); ?>" <?php post_class('osf-portfolio-archive portfolio-grid'); ?>>
    <div class="post-inner">

        <?php if (has_post_thumbnail() && '' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('editech-featured-image-large'); ?>
                </a>
            </div><!-- .post-thumbnail -->

        <?php endif; ?>

        <div class="post-content">
            <div class="entry-header">
                <div class="entry-category"><?php echo OSF_Custom_Post_Type_Portfolio::getInstance()->get_term_portfolio(get_the_ID()); ?></div>
                <h3 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            </div>
        </div>
    </div>
</article><!-- #post-## -->