<?php

	/**
	 * AUTHOR PROFILE
	 */

?>

	<section class="author-profile">
		<div class="inner">
			<div class="info" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
				<a href="<?php ecko_get_author_url(); ?>" class="gravatar"><img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5(get_the_author_meta('user_email'))); ?>" itemprop="image" alt="<?php the_author(); ?>" data-no-retina="true"></a>
				<h3 class="author-profile-name" itemprop="name">
					<a href="<?php ecko_get_author_url(); ?>" itemprop="url" rel="author"><?php the_author(); ?></a>
				</h3>
				<hr>
			</div>
			<p class="author-profile-bio"><?php echo esc_html(get_the_author_meta('description')); ?></p>
			<ul class="author-profile-social">
				<?php if(get_the_author_meta('twitter') != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('twitter', $post->post_author)); ?>" target="_blank" class="socialminimal twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('facebook', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('facebook', $post->post_author)); ?>" target="_blank" class="socialminimal facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('google-plus', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('google-plus', $post->post_author)); ?>" target="_blank" class="socialminimal google" title="Google+"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('dribbble', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('dribbble', $post->post_author)); ?>" target="_blank" class="socialminimal dribbble" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('instagram', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('instagram', $post->post_author)); ?>" target="_blank" class="socialminimal instagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('github', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('github', $post->post_author)); ?>" target="_blank" class="socialminimal github" title="GitHub"><i class="fa fa-github"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('youtube', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('youtube', $post->post_author)); ?>" target="_blank" class="socialminimal youtube" title="YouTube"><i class="fa fa-youtube"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('pinterest', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('pinterest', $post->post_author)); ?>" target="_blank" class="socialminimal pinterest" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('linkedin', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('linkedin', $post->post_author)); ?>" target="_blank" class="socialminimal linkedin" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('skype', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('skype', $post->post_author)); ?>" target="_blank" class="socialminimal skype" title="Skype"><i class="fa fa-skype"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('tumblr', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('tumblr', $post->post_author)); ?>" target="_blank" class="socialminimal tumblr" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('flickr', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('flickr', $post->post_author)); ?>" target="_blank" class="socialminimal flickr" title="Flickr"><i class="fa fa-flickr"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('reddit', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('reddit', $post->post_author)); ?>" target="_blank" class="socialminimal reddit" title="Reddit"><i class="fa fa-reddit"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('stack-overflow', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('stack-overflow', $post->post_author)); ?>" target="_blank" class="socialminimal stack-overflow" title="Stack Overflow"><i class="fa fa-stack-overflow"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('twitch', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('twitch', $post->post_author)); ?>" target="_blank" class="socialminimal twitch" title="Twitch"><i class="fa fa-twitch"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vine', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vine', $post->post_author)); ?>" target="_blank" class="socialminimal vine" title="Vine"><i class="fa fa-vine"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vk', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vk', $post->post_author)); ?>" target="_blank" class="socialminimal vk" title="VK"><i class="fa fa-vk"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('vimeo', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('vimeo', $post->post_author)); ?>" target="_blank" class="socialminimal vimeo" title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('weibo', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('weibo', $post->post_author)); ?>" target="_blank" class="socialminimal weibo" title="Weibo"><i class="fa fa-weibo"></i></a></li>
				<?php } ?>
				<?php if(get_the_author_meta('soundcloud', $post->post_author) != ''){ ?>
					<li><a href="<?php echo esc_url(get_the_author_meta('soundcloud', $post->post_author)); ?>" target="_blank" class="socialminimal soundcloud" title="Soundcloud"><i class="fa fa-soundcloud"></i></a></li>
				<?php } ?>
			</ul>
		</div>
	</section>
