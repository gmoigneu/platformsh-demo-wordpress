<?php

	/**
	 * TAG TEMPLATE
	 */

	get_header();

	$background_image = (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url(get_query_var('tag_id')) != "" ? z_taxonomy_image_url(get_query_var('tag_id')) : "");

?>

	<section class="post-list">

		<header class="post-list-header">
			<div class="post-list-header-background" style="background-image:url('<?php echo esc_url($background_image); ?>');"></div>
			<div class="post-list-header-content">
				<h1><i class="fa fa-tag"></i> <?php esc_html(single_tag_title()); ?></h1>
				<?php
					if(category_description() !== ""){
						echo "<hr>" . category_description();
					}
				?>
			</div>
			<div class="clear"></div>
		</header>

		<?php get_template_part('layouts/postlist'); ?>

	</section>

<?php get_footer(); ?>
