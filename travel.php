<?php
/* Template Name: Travel */ 
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="travel-site-main">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            <div class="travel-category-wrap">
                <?php
                $temp_query = $wp_query;

                $args = array(
                'category_name'=>'Travel',
    'paged'=> $paged,
    'posts_per_page' => 9
);
                $wp_query = new WP_Query($args);
if (have_posts()) :

                    while ( $wp_query->have_posts() ) :
                        $wp_query->the_post();
        ?>
        <a class="travel-post-wrap" href="<?php the_permalink(); ?>">
        <?php
                the_post_thumbnail();
        ?>
            <h2 class="travel-post-title">
            <?php
                the_title();
            ?>
            </h2>
            <h3 class="travel-post-comments">
           <?php
                comments_number();
            ?>
            </h3>
            <p class="travel-post-content">
            <?php
                echo wp_trim_words( get_the_content(), 15, '...' );  
            ?>
            </p>
            <?php
                    endwhile;
            ?>
                </a>
            </div>
        <div class="pagination-next" >
        <?php 
            next_posts_link('Next');
        ?>
        </div>
        <div class="pagination-previous">
        <?php
        previous_posts_link('Previous');
        ?>
        </div>

    <?php 
    $wp_query = $temp_query;
endif; 
                ?>

		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php
get_footer();
