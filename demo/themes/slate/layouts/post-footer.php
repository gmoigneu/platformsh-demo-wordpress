<?php

	/**
	 * POST - FOOTER
	 */

?>

	<section class="post-footer body-wrapper">
		<div class="post-footer-upper">
			<?php slate_get_category(); ?>
			<div class="tags">
				<?php echo get_the_tag_list(); ?>
			</div>
		</div>
		<?php get_template_part('layouts/post-share'); ?>
	</section>
