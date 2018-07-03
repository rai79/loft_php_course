<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="content">
	<div class="article-title title-page"> <?php the_title(); ?> </div>
	<div class="article-image"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image поста"></div>
	<div class="article-info">
		<div class="post-date"><?php the_date(); ?></div>
	</div>
	<div class="article-text">
		<?php the_content(); ?>
	</div>
    <img src="<?php echo get_field('bottom_image')['url']; ?>">
	<?php endwhile; else: ?>
		<p><?php _e("Ничего не найдено."); ?></p>
	<?php endif; ?>

    <div class="article-pagination">
	    <?php
	    $prevPost = get_previous_post(true);
	    $nextPost = get_next_post(true);
	    ?>
	    <?php if($prevPost) :?>
            <div class="article-pagination__block pagination-prev-left">
			    <?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'thumbnail');?>
			    <?php previous_post_link('%link',"<i class='icon icon-angle-double-left'></i>Предыдущая статья", TRUE); ?>
                <div class="wrap-pagination-preview pagination-prev-left">
                    <div class="preview-article__img"><?php echo $prevthumbnail; ?></div>
                    <div class="preview-article__content">
                        <div class="preview-article__info"><a href="#" class="post-date"><?php echo date('d.m.Y', strtotime($prevPost->post_date)); ?></a></div>
                        <div class="preview-article__text"><?php echo $prevPost->post_title; ?></div>
                    </div>
                </div>
            </div>
	    <?php endif; ?>
	    <?php if($nextPost) : ?>
            <div class="article-pagination__block pagination-prev-right">
			    <?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'thumbnail'); ?>
			    <?php next_post_link('%link',"Следующая статья<i class='icon icon-angle-double-right'></i>", TRUE); ?>
                <div class="wrap-pagination-preview pagination-prev-right">
                    <div class="preview-article__img"><?php echo $nextthumbnail; ?></div>
                    <div class="preview-article__content">
                        <div class="preview-article__info"><a href="#" class="post-date"><?php echo date('d.m.Y', strtotime($nextPost->post_date)); ?></a></div>
                        <div class="preview-article__text"><?php echo $prevPost->post_title; ?></div>
                    </div>
                </div>
            </div>
	    <?php endif; ?>
    </div>
</div>
<?php get_template_part('_parts/sidebar'); ?>
<?php get_footer(); ?>
