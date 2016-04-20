<?php

	/**
	 * ARCHIVE TEMPLATE
	 */

	get_header();

?>

	<section class="post-list">

		<header class="post-list-header">
			<div class="post-list-header-background" style="background-image:url('<?php echo esc_url(slate_get_default_background_image()); ?>');"></div>
			<div class="post-list-header-content">
				<h1>
					<i class="fa fa-clock-o"></i>
					<?php
						if(is_day()){
							esc_html(the_time('F jS, Y'));
						}elseif(is_month()){
							esc_html(the_time('F, Y'));
						}elseif(is_year()){
							esc_html(the_time('Y'));
						};
					?>
				</h1>
			</div>
		</header>

		<?php get_template_part('layouts/postlist'); ?>

	</section>

<?php get_footer(); ?>
