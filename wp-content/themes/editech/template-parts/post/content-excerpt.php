<?php $post_class = !is_single() ? "archive-post" : "";?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
    <div class="post-inner">
        <div class="post-content">
            <header class="entry-header">
                <?php
                if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php
                        editech_entry_meta(); ?>
                    </div><!-- .entry-meta -->
                <?php endif;

                if (is_single()) {
                } elseif (is_front_page() && is_home()) {
                    the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                } else {
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                }?>

            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->

            <?php if (is_single()) {
                editech_entry_footer();
            } ?>

        </div> <!-- #Post-content -## -->
    </div> <!-- #Post-inner -## -->
</article><!-- #post-<?php the_ID(); ?> -->
