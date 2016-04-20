<?php

	/**
	 * SEARCH TEMPLATE
	 */

	get_header();

?>

	<section class="post-list">

		<header class="post-list-header">
			<div class="post-list-header-background" style="background-image:url('<?php echo esc_url(slate_get_default_background_image()); ?>');"></div>
			<div class="post-list-header-content">
				<h1><i class="fa fa-search"></i> <?php echo esc_attr(get_search_query()); ?></h1>
		</header>

		<?php get_template_part('layouts/postlist'); ?>

	</section>

<?php get_footer(); ?>
