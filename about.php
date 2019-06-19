<?php
/* Template Name: About */ 
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="about-site-main">

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
		<div class="about-wrap">
		  <p>
		    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos numquam perspiciatis nulla adipisci ipsa corporis mollitia, tempora facilis delectus praesentium recusandae corrupti libero odit iste a aut nesciunt nihil necessitatibus!
		</p>
		<p>
		    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos numquam perspiciatis nulla adipisci ipsa corporis mollitia, tempora facilis delectus praesentium recusandae corrupti libero odit iste a aut nesciunt nihil necessitatibus!
		</p>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
