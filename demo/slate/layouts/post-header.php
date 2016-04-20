<?php

	/**
	 * POST - HEADER
	 */

	$post_image = null;
	if(has_post_thumbnail()){
		$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'background');
		$post_image = $post_image[0];
	}

	$slate_postheader_meta = get_post_meta($post->ID, 'slate_postheader', true);

	$header_class = "";
	switch($slate_postheader_meta){
		case "postheader-image":
			$header_class = "post-header-image";
			break;
		case "postheader-featured":
			$header_class = "post-header-featured";
			break;
		case "postheader-featured-full":
			$header_class = "post-header-featured-full";
			break;
	}

?>

	<header class="post-header <?php echo esc_attr($header_class); ?>">
		<div class="post-header-background" style="background-image:url('<?php echo esc_url($post_image); ?>');"></div>
		<div class="post-header-gradient"></div>
		<div class="post-info body-wrapper">
			<ul class="post-meta">
				<li class="post-category"><?php slate_get_category(); ?></li>
				<li class="post-author"><a href="<?php ecko_get_author_url(); ?>"><?php the_author(); ?></a></li>
				<li class="post-date"><a href="<?php the_permalink(); ?>"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></a></li>
				<li class="post-read-time"><a href="<?php the_permalink(); ?>"><?php echo esc_html(ecko_estimated_reading_time()); ?> <?php esc_html_e('Min Read', 'slate'); ?></a></li>
			</ul>
			<h1 class="post-title" itemprop="name headline"><?php the_title(); ?></h1>
			<p class="post-subtitle"><?php echo esc_html(get_post_meta($post->ID, 'slate_subtitle', true)); ?></p>
			<hr>
		</div>
		<div class="clear"></div>
	</header>
