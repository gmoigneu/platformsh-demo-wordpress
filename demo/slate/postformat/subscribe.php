<?php

	/**
	 * POST FORMAT - SUBSCRIBE
	 */

?>

	<div class="post-item post-item-default post-item-subscribe">
		<div class="post-info">
			<h2 class="post-title"><?php echo esc_html(get_theme_mod('subscription_title', "")); ?></h2>
			<p class="post-subtitle"><?php echo esc_html(get_theme_mod('subscription_description', "")); ?></p>
			<?php echo get_theme_mod('subscription_embed_code', ""); ?>
		</div>
	</div>
