<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hw_blog_name
 */

?>

<div class="col-md-12 col-lg-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <a href="<?php echo get_permalink() ;?>" class="entry-link">
            <div class="entry-link-content">

                <div class="entry-thumbnail">

                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'small-thumbnail' );
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/Looking-for-work.jpg">
                    <?php } ?>

                </div>

                <h3 class="entry-title"><?php the_title(); ?></h3>

                <div class="entry-excerpt"><?php the_excerpt(); ?></div>

            </div>
        </a>

    </article><!-- #post-## -->
</div>

