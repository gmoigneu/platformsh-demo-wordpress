<?php

	/**
	 * COPYRIGHT
	 */

?>

	<section class="widget copyright">
		<p class="main">
			<?php if(!get_theme_mod('copyright_upper_html', false)){ ?>
			<?php esc_html_e('Copyright', 'slate'); ?> &copy; <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html(bloginfo('name')); ?></a>. <?php echo date("Y"); ?> &bull; <?php esc_html_e('All rights reserved', 'slate'); ?>.
			<?php }else{ echo get_theme_mod('copyright_upper_html', false); } ?>
		</p>
		<p class="alt">
			<?php if(!get_theme_mod('copyright_lower_html', false)){ ?>
			<span class="ecko"><a target="_blank" href="http://ecko.me/themes/wordpress/slate/">Slate WordPress Theme</a> by <a target="_blank" href="http://ecko.me">EckoThemes</a>.</span>
			<span class="wordpress"><?php esc_html_e('Published with', 'slate'); ?> <a target="_blank" href="http://wordpress.org">WordPress</a>.</span>
			<?php }else{ echo get_theme_mod('copyright_lower_html', false); } ?>
		</p>
	</section>
