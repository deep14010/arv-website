<div class="column-item post-style-4">
    <div class="post-inner">

        <?php if (has_post_thumbnail() && '' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div><!-- .post-thumbnail -->

        <?php endif; ?>
        <div class="post-content">

            <?php editech_cat_links(); ?>

            <header class="entry-header">
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php editech_entry_meta(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

            </header>
        </div>

    </div>
</div>