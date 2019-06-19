<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TravelBlog
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
    <section class="landing">
        <article class="travel">
            <div class="travel-wrap">
                <?php
                    $travel_query = new WP_Query('category_name=Travel&&posts_per_page=3');
                    $i=0;
                ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
                <?php
                while ( 
                    $travel_query->have_posts() ) :
                    $travel_query->the_post();
                
                ?>
    <div class="carousel-item 
    <?php if($i===0):echo 'active';
    endif;
    ?>
    ">
        <div class="travel-carousel-wrap">
            <div class="travel-img-wrap">
                <a href="
                <?php 
                    the_permalink()
                ?>
                " class="travel-img">
                    <?php            the_post_thumbnail(); 
                    ?>
                </a>    
            </div>
            <div class="post-wrap">
                <h2 class="post-title-wrap">
                    <a href="<?php the_permalink();
                     ?>"><?php the_title(); ?>
                    </a>
                </h2>
                <a href="<?php the_permalink();
                     ?>"><?php 
            the_excerpt();
        ?>
                </a>
            </div>
        </div>            
    </div>
      <?php
    $i++;
    endwhile;
?>

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>               
               
               
               
               
               
               
               
                
            </div>
        </article>
        <article class="blog">
            <h2 class="blog-title">Articles</h2>
            <div class="blog-wrap">
             <?php
                $article_query = new WP_Query('category_name=Articles&&posts_per_page=3')
            ?>
            <?php
                while ( $article_query->have_posts() ) :
                            $article_query->the_post();
            ?>
                <a class="article-post-wrap" href="<?php the_permalink(); ?>">
                    <div class="thumbnail-wrap">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h2>
                        <?php the_title(); ?>     
                    </h2>
                    <div class="content-wrap">
                        <?php 
                            echo wp_trim_words( get_the_content(), 15, '...' );
                        ?>    
                    </div>
                </a>
        <?php                    
            endwhile;
        ?>
            </div>            
        </article>
        <article class="list-travel">
            <h2 class="list-travel-title">Posts</h2>
            <div class="list-travel-wrap">
            <?php
                while ( have_posts() ) :
                the_post();
            ?>
                <a class="list-travel-post-wrap" href="<?php the_permalink(); ?>">
                    <div class="thumbnail-wrap">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="post-content">
                        <h2>
                            <?php the_title(); ?>     
                        </h2>
                        <div class="content-wrap">
                            <?php 
                                echo wp_trim_words( get_the_content(), 30, '...' );
                            ?>    
                        </div>
                    </div>
                </a>
        <?php                    
            endwhile;
        ?>
           <div class="pagination">
               <?php
                echo paginate_links();
               ?>
           </div>
            </div>            
        </article>
        
        
        
        
        
    </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
