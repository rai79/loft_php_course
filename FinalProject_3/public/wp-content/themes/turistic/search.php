<?php get_header(); ?>

<div class="content">

	<?php $date2 = ''; ?>
    <?php
    $serch_str = $GLOBALS['s'];
	$posts = query_posts([
		'post_type' => ['post','promotions'],
		's' => $serch_str,
		'paged' => get_query_var('paged')
	]);
	?>
	<h1 class="title-page">Поиск по "<?php echo $serch_str; ?>" дал следующие результаты:</h1>

	<div class="posts-list">
		<!-- post-mini-->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="post-wrap">
				<div class="post-thumbnail">
					<?php
					$image = get_the_post_thumbnail_url();
					if ($image): ?>
						<img src="<?php echo $image;  ?>" alt="Image поста" class="post-thumbnail__image">
					<?php endif; ?>
				</div>
				<div class="post-content">
					<div class="post-content__post-info">
						<div class="post-date">
							<?php $date = get_the_date();
							if (!empty($date)) {
								echo $date;
							} else {
								$date2 = get_the_date();
							}
							?>
						</div>
					</div>
					<div class="post-content__post-text">
						<div class="post-title">
							<?php the_title(); ?>
						</div>
						<p>
							<?php the_excerpt(); ?>
						</p>
					</div>
					<div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
				</div>
			</div>
			<!-- post-mini_end-->
		<?php endwhile; else: ?>
			<p><?php _e("Ничего не найдено."); ?></p>
		<?php endif; ?>

	</div>
	<?php
	// удаляет H2 из шаблона пагинации
	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
		return '
        <nav class="navigation %1$s" role="navigation">
        <div class="nav-links">%3$s</div>
        </nav>
        ';
	}
	$args = array(
		'show_all'     => false, // показаны все страницы участвующие в пагинации
		'end_size'     => 1,     // количество страниц на концах
		'mid_size'     => 1,     // количество страниц вокруг текущей
		'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
		'prev_text'    => __('<i class="icon icon-angle-double-left"></i>'),
		'next_text'    => __('<i class="icon icon-angle-double-right"></i>'),
		'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
		'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
		'screen_reader_text' => __( 'Posts navigation' ),
	);
	the_posts_pagination($args);
	wp_reset_query();
	wp_reset_postdata();
	?>
</div>

<?php get_template_part('_parts/sidebar'); ?>
<?php get_footer(); ?>
