<div class="column-item post-style-1">
    <div class="post-inner">

        <?php if (has_post_thumbnail() && '' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('editech-featured-image-large'); ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>

        <div class="post-content">

            <header class="entry-header">
                <?php editech_cat_links(); ?>

                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php editech_entry_meta(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

            </header><!-- .entry-header -->

            <div class="entry-content">
                <a class="more-link" href="<?php the_permalink(); ?>">
                    <span><?php echo esc_html__('Read more', 'editech') ?></span>
                    <i class="opal-icon-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    </div>
</div>