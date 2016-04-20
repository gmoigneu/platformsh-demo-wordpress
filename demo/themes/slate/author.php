<?php

	/**
	 * AUTHOR TEMPLATE
	 */

	get_header();

?>

	<section class="post-list">

		<header class="post-list-header post-list-header-author">
			<div class="post-list-header-background" style="background-image:url('<?php echo esc_url(slate_get_default_background_image()); ?>');"></div>
			<div class="post-list-header-content">
				<?php get_template_part('layouts/author-profile'); ?>
			</div>
			<div class="clear"></div>
		</header>

		<?php get_template_part('layouts/postlist'); ?>

	</section>

<?php get_footer(); ?>
