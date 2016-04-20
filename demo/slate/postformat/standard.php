<?php

	/**
	 * POST FORMAT - STANDARD
	 */

	$post_image = null;

	if(is_home() && !is_paged() && $wp_query->current_post == 0){
		if(has_post_thumbnail()){
			$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
			$post_image = $post_image[0];
		}
		$post_class = "post-item post-item-featured";
	}elseif(get_theme_mod('postlist_layout', 'default') == "single-column"){
		if(has_post_thumbnail()){
			$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
			$post_image = $post_image[0];
		}
		$post_class = "post-item post-item-default";
	}else{
		if(has_post_thumbnail()){
			$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'opengraph');
			$post_image = $post_image[0];
		}
		$post_class = "post-item post-item-default";
	}

?>

	<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
		<div class="post-background" style="background-image:url('<?php echo esc_url($post_image); ?>');"></div>
		<div class="post-info">
			<ul class="post-meta">
				<li class="post-category"><?php slate_get_category(true); ?></li>
				<li class="post-author"><?php the_author(); ?></li>
				<li class="post-date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></li>
				<li class="post-read-time"><?php echo esc_html(ecko_estimated_reading_time()); ?> <?php esc_html_e('Min Read', 'slate'); ?></li>
			</ul>
			<h2 class="post-title"><?php the_title(); ?></h2>
			<p class="post-subtitle"><?php echo slate_get_post_subtitle(); ?></p>
		</div>
		<div class="clear"></div>
	</a>
