<?php

	/**
	 * POST - NEXT
	 */

	if(is_single()){

	$next_post = get_previous_post();

?>

	<?php if(!empty($next_post)){
		setup_postdata($next_post);
		$post_image = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'background');
	?>
		<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="post-next">
			<div class="post-next-background" style="background-image:url('<?php echo esc_url($post_image[0]); ?>');"></div>
			<div class="post-next-gradient"></div>
			<div class="post-next-label"><?php esc_html_e('Next Post', 'slate'); ?></div>
			<div class="post-info">
				<span class="post-category"><?php slate_get_category(true); ?></span>
				<h3 class="post-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></h3>
				<p class="post-subtitle"><?php echo esc_html(ecko_truncate_by_words(get_the_excerpt(), 86, '...')); ?></p>
			</div>
		</a>
	<?php }
		wp_reset_postdata();
	?>

<?php } ?>
