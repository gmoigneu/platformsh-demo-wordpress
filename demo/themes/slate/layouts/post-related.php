<?php

	/**
	 * POST - RELATED
	 */

	global $post;

	$related_posts = ecko_get_related_posts($post->ID, 3, true, true);
	$related_posts_count = count($related_posts);

	if($related_posts_count > 0){

?>

	<section class="post-related post-related-count-<?php echo esc_attr($related_posts_count); ?>">
		<?php
			foreach($related_posts as $post){
			setup_postdata($post);
			$post_image = null;
			if(has_post_thumbnail()){
				$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'opengraph');
				$post_image = $post_image[0];
			}
		?>
		<a href="<?php the_permalink(); ?>" class="post-related-item">
			<div class="post-related-background" style="background-image:url('<?php echo esc_url($post_image); ?>');"></div>
			<div class="post-info">
				<span class="post-category"><?php slate_get_category(true); ?></span>
				<h3 class="post-title"><?php the_title(); ?></h3>
				<ul class="post-meta">
					<li class="post-author"><?php the_author(); ?></li>
					<li class="post-date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php echo esc_html(ecko_date_format()); ?></time></li>
				</ul>
			</div>
			<div class="clear"></div>
		</a>
		<?php } ?>
	</section>

<?php

	}

	wp_reset_postdata();

?>
