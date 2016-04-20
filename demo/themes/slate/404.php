<?php

	/**
	 * ERROR 404 TEMPLATE
	 */

	get_header();

?>

	<header class="error">
		<div class="inner body-wrapper">
			<h1 class="error-title"><?php esc_html_e('Error', 'slate'); ?> 404</h1>
			<hr>
			<p class="error-description"><?php esc_html_e('The page you were looking for cannot be found, it may have been moved or no longer exists. You can navigate back to the homepage by clicking', 'slate'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('here', 'slate'); ?></a>.</p>
			<?php get_template_part('searchform'); ?>
		</div>
	</header>

	<section class="post-list">

		<header class="post-list-header-basic">
			<h4><i class="fa fa-navicon"></i> <?php esc_html_e('Latest Articles', 'slate'); ?></h4>
		</header>

		<?php
			$latest_posts = ecko_get_latest_posts(4);
			foreach($latest_posts as $post){
				setup_postdata($post);
				include(locate_template('postformat/standard.php'));
			}
			wp_reset_postdata();
		?>

	</section>

<?php get_footer(); ?>
