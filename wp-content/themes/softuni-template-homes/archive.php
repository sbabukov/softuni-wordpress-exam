<?php get_header(); ?>
<?php the_archive_title(); ?>

    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
        <!-- content -->
        
        <!-- call template-part job-item, 'template-parts/home', 'item', template-parts is name of folder -->
        <?php get_template_part( 'template-parts/home', 'item' )?>

        <?php endwhile; ?>

        <?php posts_nav_link(); ?>
    <?php endif; ?>
	
<?php get_footer(); ?>