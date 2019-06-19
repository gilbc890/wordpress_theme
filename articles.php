<?php
/* Template Name: Travel */ 
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="articles-site-main">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'notitle' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            <div class="articles-category-wrap">
                <?php
                $temp_query = $wp_query;

                $args = array(
                'category_name'=>'Articles',
    'paged'=> $paged,
    'posts_per_page' => 5
);
                $wp_query = new WP_Query($args);
if (have_posts()) :

                    while ( $wp_query->have_posts() ) :
                        $wp_query->the_post();
        ?>
        <a class="article-category-wrap" href="<?php the_permalink(); ?>">
        <?php
                the_post_thumbnail();
        ?>
            <h2 class="article-post-title">
            <?php
                the_title();
            ?>
            </h2>
            <h3 class="article-post-comments">
           <?php
                comments_number();
            ?>
            </h3>
            <p class="article-post-content">
            <?php
                echo wp_trim_words( get_the_content(), 100, '...' );  
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
