<?php

	/**
	 * PAGINATION
	 */

	if($wp_query->max_num_pages > 1){

?>
	
	<nav class="pagination">
		<div class="container">
			<div class="pagination-default">
				<?php previous_posts_link('<span class="sub"><i class="fa fa-chevron-left"></i></span><span class="main">' . esc_html__('Newer Posts', 'slate') . '</span>'); ?>
				<?php ecko_paging_nav(); ?>
				<?php next_posts_link('<span class="main">' . esc_html__('Older Posts', 'slate') . '</span><span class="sub"><i class="fa fa-chevron-right"></i></span>'); ?>
			</div>
			<div class="pagination-infinite">
				<div class="pagination-button pagination-ajax">
					<i class="fa fa-refresh animate-spin"></i> <?php esc_html_e('Fetching Posts...', 'slate'); ?>
				</div>
			</div>
		</div>
	</nav>

<?php }elseif(!is_404()){ ?>

	<?php get_template_part('no-results'); ?>

<?php } ?>
