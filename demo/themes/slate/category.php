<?php

	/**
	 * CATEGORY TEMPLATE
	 */

	get_header();

	$background_image = (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() != "" ? z_taxonomy_image_url() : "");

?>

	<section class="post-list">

		<header class="post-list-header">
			<div class="post-list-header-background" style="background-image:url('<?php echo esc_url($background_image); ?>');"></div>
			<div class="post-list-header-content">
				<h1><?php single_cat_title('', true); ?></h1>
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
