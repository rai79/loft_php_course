<!-- sidebar-->
<div class="sidebar">
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Теги</div>
        <div class="sidebar-item__content">
            <div class="tags-list">
	            <?php
	            wp_tag_cloud( array(
		            'smallest'  => 0.9,
		            'largest'   => 0.9,
		            'unit'      => 'rem',
		            'number'    => 0,
		            'format'    => 'list',
		            'separator' => "",
		            'orderby'   => 'name',
		            'order'     => 'ASC',
		            'exclude'   => null,
		            'include'   => null,
		            'link'      => 'view',
		            'taxonomy'  => 'post_tag',
		            'echo'      => true,
		            'topic_count_text_callback' => 'default_topic_count_text',
	            ) );
	            ?>
            </div>
        </div>
    </div>
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Категории</div>
        <div class="sidebar-item__content">
	        <?php
	        $args = array(
		        'show_option_all'    => '',
		        'show_option_none'   => __('No categories'),
		        'orderby'            => 'name',
		        'order'              => 'ASC',
		        'show_last_update'   => 0,
		        'style'              => 'list',
		        'show_count'         => 0,
		        'hide_empty'         => 1,
		        'use_desc_for_title' => 0,
		        'child_of'           => 0,
		        'feed'               => '',
		        'feed_type'          => '',
		        'feed_image'         => '',
		        'exclude'            => '1',
		        'exclude_tree'       => '',
		        'include'            => '',
		        'hierarchical'       => true,
		        'title_li'           => __( '' ),
		        'number'             => NULL,
		        'echo'               => 1,
		        'depth'              => 0,
		        'current_category'   => 0,
		        'pad_counts'         => 0,
		        'taxonomy'           => 'category',
		        'walker'             => 'Walker_Category',
		        'hide_title_if_empty' => false,
		        'separator'          => '<br />',
	        );

	        echo '<ul class="category-list">';
	        wp_list_categories( $args );
	        echo '</ul>';
	        ?>
        </div>
    </div>
	<?php if ( is_active_sidebar( 'wp_sidebar' ) ) : ?>

        <div id="wp_sidebar" class="sidebar__sidebar-item">

			<?php dynamic_sidebar( 'wp_sidebar' ); ?>

        </div>

	<?php endif; ?>
</div>
