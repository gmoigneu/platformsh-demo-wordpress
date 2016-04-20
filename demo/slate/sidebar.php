<?php

	/**
	 * SIDEBAR - LEFT
	 */

?>

	<aside class="page-sidebar">

		<i class="fa fa-close sidebar-close"></i>

		<div class="page-sidebar-sticky">

			<?php
				if(is_single()){
					if(is_active_sidebar('sidebar-post')){
						dynamic_sidebar('sidebar-post');
					}else{
						slate_get_default_widgets();
					}
				}else{
					if(is_active_sidebar('sidebar-page')){
						dynamic_sidebar('sidebar-page');
					}else{
						slate_get_default_widgets();
					}
				}
			?>

			<?php get_template_part('layouts/copyright'); ?>

		</div>

	</aside>
