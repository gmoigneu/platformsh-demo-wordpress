<?php

	/**
	 * SINGLE TEMPLATE
	 */

	get_header();

?>

	<?php while(have_posts()) : the_post(); ?>

		<article class="postpage">

			<?php get_template_part('layouts/post-header'); ?>

			<section class="postcontents body-wrapper">
				<?php the_content(); ?>
				<div class="post-numbers">
					<?php wp_link_pages(); ?>
				</div>
			</section>

			<?php get_template_part('layouts/author-profile'); ?>

			<?php
				if(get_theme_mod('general_disqus_plugin_support', false)){
					get_template_part('layouts/disqus');
				}else{
					comments_template('', true);
				}
			?>

			<?php get_template_part('layouts/post-next'); ?>

		</article>

	<?php endwhile; ?>

<?php get_footer(); ?>
