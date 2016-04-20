<?php

	/**
	 * COMMENTS TEMPLATE
	 */

	if('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
		die(esc_html__('Please do not load this page directly.', 'slate'));
	}

	if(post_password_required()){
		return;
	}

	if(comments_open() != false):

?>

	<header class="post-list-header-basic comments-show">
		<h4><i class="fa fa-comments"></i> <?php esc_html_e('View Comments', 'slate'); ?></h4>
	</header>

	<section class="post-comments body-wrapper">

		<a class="commentanchor" id="comments"></a>

		<div class="comments-main">

			<?php if(have_comments()): ?>

				<ul class="commentwrap">
					<?php wp_list_comments('type=comment&callback=slate_comment_format'); ?>
				</ul>

				<?php previous_comments_link(); ?>
				<?php next_comments_link(); ?>

			 <?php else : ?>
				<?php if(comments_open()): ?>

					<div class="commentwrap">
						<div class="notification nocomments"><i class="fa fa-info"></i> <?php esc_html_e('There are currently no comments.', 'slate'); ?></div>
					</div>

				<?php endif; ?>
			<?php endif; ?>

			<?php
				if(comments_open()){
					$options = array(
						'id_form' => 'commentform',
						'id_submit' => 'submit',
						'title_reply' => '',
						'title_reply_to' => '<div class="notification"><i class="fa fa-comments-o"></i>' . esc_html__('Leave a Reply to', 'slate') . ' %s' . '</div>',
						'cancel_reply_link' => esc_html__('Cancel Reply', 'slate'),
						'label_submit' => esc_html__('Post Comment', 'slate'),
						'comment_field' =>  '<textarea placeholder="' . esc_attr__('Add your comment here', 'slate') . '..." name="comment" class="commentbody" id="comment" rows="5" tabindex="4"></textarea>',
						'comment_notes_after' => '',
						'comment_notes_before' => '',
						'fields' => apply_filters('comment_form_default_fields', array(
							'author' => '<input type="text" placeholder="' . esc_attr__('Name', 'slate') . ' ' . ( $req ?  '(' . esc_attr__('Required', 'slate') . ')' : '') . '" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />',
							'email' => '<input type="text" placeholder="' . esc_attr__('Email', 'slate') . ' ' . ( $req ? '(' . esc_attr__('Required', 'slate') . ')' : '') . '" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />',
							'url' => '<input type="text" placeholder="' . esc_attr__('Website URL', 'slate') . '" name="url" id="url" value="' . esc_attr($comment_author_url) . '" size="22" tabindex="1" />'
							)
						)
					);
					comment_form($options);
				}
			?>

		</div>

	</section>

<?php endif; ?>
