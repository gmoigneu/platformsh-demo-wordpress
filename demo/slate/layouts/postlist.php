<?php

	/**
	 * POSTLIST
	 */

	$post_count = 0;

?>

	<?php if(have_posts()): ?>

		<section class="<?php echo slate_get_post_list_classes(); ?>">

			<div class="post-list-container">

				<?php while(have_posts()) : the_post();

					// SUBSCRIBE WIDGET
					if(get_theme_mod('subscription_enabled', false)
						&& $wp_query->current_post != 0
						&& $post_count == 3){
							get_template_part('postformat/subscribe');
					}

					$post_format = (get_post_format() === false) ? "standard" : get_post_format();

					switch($post_format){
						case "standard":
							include(locate_template('postformat/standard.php'));
							break;
						default:
							include(locate_template('postformat/standard.php'));
							break;
					}

					$post_count++;

				endwhile; ?>

			</div>

			<?php get_template_part('layouts/pagination'); ?>

		</section>

	<?php else : ?>

		<?php get_template_part('no-results'); ?>

	<?php endif; ?>
