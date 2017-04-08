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

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>

        <?php else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>

        <div class="">

            <h2>Maxims custom pages</h2>

            <?php

            $categoryPages = new WP_Query( array(
                'post_type' => 'maxim',
                'posts_per_page' => 4,
            ) );

            if ( $categoryPages->have_posts() ) :
                while ( $categoryPages->have_posts() ) : $categoryPages->the_post(); ?>

                    <h3><?php the_title(); ?></h3>

                    <?php the_time( 'F jS, Y g:i a' ); ?> | by <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?></a> | posted in

                    <?php

                    $categories = get_the_category();
                    $separator = ', ';
                    $output = '';

                    if( $categories ){

                        foreach ( $categories as $category ){

                            $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $separator ;

                        }

                        echo trim($output, $separator);

                    }

                    ?>

                    <?php the_content(); ?>

                <?php endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </div>
















    </div><!-- col-8 -->

    <div class="col-md-12 col-lg-4">

        <?php get_sidebar(); ?>

    </div>

<?php get_footer();
