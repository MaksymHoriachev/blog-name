<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hw_blog_name
 */

get_header(); ?>

        <div class="col-md-12 col-lg-8">

            <div id="primary" class="content-area">
                <main id="main" class="site-main container" role="main">
                    <div class="row">

                        <div class="col-12 blog-title">
                            <div class="blog-title-entry">
                                <span><?php echo get_theme_mod( 'blog_title_head_name' ); ?></span>
                            </div>
                        </div>

                        <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post(); ?>

                                <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                            <?php endwhile; ?>

                            <div class="blog-pagination col-12">
                                <?php the_posts_pagination( array(
                                    'prev_text'     => __( 'Previous page' ),
                                    'next_text'     => __( 'Next page' ),
                                    'prev_next'     => false
                                ) ); ?>
                            </div>

                        <?php else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>

                    </div>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- col-8 -->

        <div class="col-md-12 col-lg-4">

            <?php get_sidebar(); ?>

        </div>

<?php get_footer();
