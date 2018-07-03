<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="content">
    <div class="article-title title-page"> <?php the_title(); ?> </div>
    <?php the_content(); ?>
	<?php endwhile; else: ?>
        <p><?php _e("Ничего не найдено."); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
