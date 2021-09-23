<?php

if ( ! function_exists( 'landex_related_post_list' ) ) {
   /**
    * Related post list
    */
    function landex_related_post_list(){
        ?>
        <div class="landex-section bg-landex-alabaster p-t-50 p-b-25 p-sm-t-b-50">
            <div class="container">
                <div class="landex-section-title text-center m-b-40">
                    <?php
                    $related_title = get_theme_mod('landex_related_posts_title', __("Related Posts", "landex"));
                    if ( $related_title ) {
                        echo '<h2>' . esc_html( $related_title  ) . '</h2>';
                    }
                    ?>
                </div>
                <?php
                if( function_exists('landex_related_posts') ) :
                $related_query = new WP_Query( landex_related_posts(get_the_ID()) );
                
                if ( $related_query->have_posts() ) : ?>
                <div class="row">
                    <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="landex-blog-wrap single-related-item landex-blog-three-column m-b-none">
                            <?php if( has_post_thumbnail() ) : ?>
                            <div class="landex-blog-thumb">
                                <?php the_post_thumbnail('landex-featured-thumb'); ?>
                            </div>
                            <?php endif; ?>
                            <a class="landex-related-title" href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
                </div><!-- .row -->
                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no similar posts found.', 'landex' ); ?></p>
                <?php endif; ?>
                <?php endif; ?>
            </div><!-- .container -->
        </div><!-- .landex-section -->
        <?php
    }
    
}

/**
 * Managed functions for general section hooking
 *
 * @since 1.0.0
 */
add_action( 'landex_related_posts', 'landex_related_post_list' );