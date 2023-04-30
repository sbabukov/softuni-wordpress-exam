<?php get_header(); ?>

AUTHOR.PHP
<h1><?php the_archive_title(); ?></h1>

<div class="author-bio"><?php echo the_author_meta( 'user_description'); ?></div>


<?php if ( have_posts() ) : ?>
	<ul class="jobs-listing">
		<?php while ( have_posts() ) : ?> 
			
			<?php the_post(); ?> 
			
            <?php get_template_part( 'template-parts/home', 'item' )?>

			
		<?php endwhile; ?>
	</ul>
    
    <?php else: ?>
        
        <?php _e( 'Not found posts', 'softuni'); ?>
 <?php endif; ?> 

	
<?php get_footer(); ?>