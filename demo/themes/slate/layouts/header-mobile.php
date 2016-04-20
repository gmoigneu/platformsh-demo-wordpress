<?php

	/**
	 * HEADER - MOBILE
	 */

	$cover_logo = get_theme_mod('general_blog_light_image');

?>

	<header class="header-mobile">
		<div class="toggle-sidebar"><i class="fa fa-navicon"></i></div>
		<?php if($cover_logo != ""){ ?>
			<div class="title" itemprop="headline"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($cover_logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"></a></div>
		<?php }else{ ?>
			<h2 class="title" itemprop="headline"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html(bloginfo('name')); ?></a></h2>
		<?php } ?>
	</header>
