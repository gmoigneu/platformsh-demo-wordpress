<?php

	/**
	 *
	 * 	SLATE THEME
	 *
	 * 	@author EckoThemes <support@ecko.me>
	 * 	@version 1.3.0
	 * 	@link http://ecko.me
	 *
	 */


	/*-----------------------------------------------------------------------------------*/
	/* CONFIGURATION
	/*-----------------------------------------------------------------------------------*/

	/*
	 *	THEME INFO
	 */
	define('ECKO_THEME', true);
	define('ECKO_THEME_ID', 'slate');
	define('ECKO_THEME_NAME', 'Slate');
	define('ECKO_THEME_VERSION', '1.3.0');
	define('ECKO_THEME_WIDTH', '860');
	define('ECKO_DATE_FORMAT', 'jS M \'y');
	define('ECKO_DEMO', false);

	/*
	 *	TYPOGRAPHY
	 */
	DEFINE('ECKO_FONT_BODY_FAMILY', "Open Sans");
	DEFINE('ECKO_FONT_BODY_WEIGHT', "400,600");
	DEFINE('ECKO_FONT_BODY_SELECTOR', "body, html, .comment-respond textarea, p, .widget li, .widget.latestposts h5, .widget.relatedposts h4, .widget.randomposts h4, .widget .rssSummary, .shortprogress .percentage, .alert");
	DEFINE('ECKO_FONT_HEADER_FAMILY', "Montserrat");
	DEFINE('ECKO_FONT_HEADER_WEIGHT', "400,700");
	DEFINE('ECKO_FONT_HEADER_SELECTOR', ".author-profile .author-profile-name, .post-comments .nocomments, .comment .isauthor, .comment .meta, .comment .comment-reply-link, .comment h4, .comment-respond .logged-in-as, .comment-respond #cancel-comment-reply-link, .comment-respond textarea, .comment-respond input, h1, h2, h3, h4, h5, h6, input, header.post-list-header-basic h4, nav.pagination .pagination-button, nav.pagination .pagination-next, nav.pagination .pagination-previous, nav.pagination ul.page-numbers li, .post-header .post-info .post-meta, .post-header .post-info .post-category a, .post-footer .post-category, .post-footer .tags a, .post-related .post-related-item .post-category, .post-related .post-related-item .post-meta, .post-next .post-next-label, .post-next .post-info .post-category, .postcontents .wide blockquote, .postcontents blockquote, .postcontents blockquote p, .postcontents input[type=\"text\"], .postcontents input[type=\"email\"], .postcontents input[type=\"password\"], .postcontents input[type=\"submit\"], .postcontents submit, .postcontents q, .post-item .post-meta, .post-item .post-meta .post-category, .widget h3, .widget li span.count, .widget.authorprofile .meta .title, .widget.authorprofile .meta .twittertag, .widget.authorprofile .meta h3, .widget .tagcloud a, .widget.twitter .author, .widget.twitter .date, .widget.socialshare .sharebutton, .widget.latestposts .meta, .widget.relatedposts .feature:after, .widget.randomposts .feature:after, .widget.relatedposts .category, .widget.randomposts .category, .widget.relatedposts .meta, .widget.randomposts .meta, .widget.navigation li, #wp-calendar, .shorttabs .shorttabsheader, .shorttoggle .toggleheader, .shortbutton");
	DEFINE('ECKO_FONT_POST_FAMILY', "Merriweather");
	DEFINE('ECKO_FONT_POST_WEIGHT', "300,400");
	DEFINE('ECKO_FONT_POST_SELECTOR', "header.error .error-description, header.post-list-header p, .post-header .post-info .post-subtitle, .post-next .post-info .post-subtitle, .postcontents, .postcontents p, .postcontents ul, .postcontents ol, .post-item .post-subtitle");

	/*
	 *	WIDGETS
	 */
	define('ECKO_WIDGET_ADVERTISMENT', true);
	define('ECKO_WIDGET_AUTHOR_PROFILE', true);
	define('ECKO_WIDGET_BLOG_INFO', true);
	define('ECKO_WIDGET_LATEST_POSTS', true);
	define('ECKO_WIDGET_NAVIGATION', true);
	define('ECKO_WIDGET_RANDOM_POSTS', true);
	define('ECKO_WIDGET_RELATED_POSTS', true);
	define('ECKO_WIDGET_SHARE', true);
	define('ECKO_WIDGET_SOCIAL_AUTHOR', true);
	define('ECKO_WIDGET_SOCIAL_BLOG', true);
	define('ECKO_WIDGET_SUBSCRIBE', true);
	define('ECKO_WIDGET_TWITTER', true);


	/*-----------------------------------------------------------------------------------*/
	/* FRAMEWORK
	/*-----------------------------------------------------------------------------------*/

	require_once get_template_directory() . '/inc/eckoframework/eckoframework.php';


	/*-----------------------------------------------------------------------------------*/
	/* THEME SETUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_theme_setup')){
		function slate_theme_setup(){
			register_nav_menus(
				array(
					'primary' => esc_attr__('Primary Menu', 'slate')
				)
			);
		}
	}
	add_action('after_setup_theme', 'slate_theme_setup');


	/*-----------------------------------------------------------------------------------*/
	/* ENQUE FONTS, STYLES AND SCRIPTS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_load_scripts')){
		function slate_load_scripts(){
			if(!is_admin()){
				// JAVASCRIPT VARS
				wp_localize_script('ecko_js', 'ecko_theme_vars', array(
					'general_hidecomments' => esc_js(get_theme_mod('general_hidecomments', 'false')),
					'general_disable_syntax_highlighter' => esc_js(get_theme_mod('general_disable_syntax_highlighter', 'false')),
					'pagination_disable_infinite_loading' => esc_js(get_theme_mod('pagination_disbale_infinite_loading', 'false')),
					'layout_disable_lightbox' => esc_js(get_theme_mod('layout_disable_lightbox', 'false')),
					'layout_disable_sticky_sidebar' => esc_js(get_theme_mod('layout_disable_sticky_sidebar', 'false')),
					'localization_email_address' => esc_js(esc_html__('EMAIL ADDRESS', 'slate')),
					'localization_no_more_posts' => esc_js(esc_html__('No More Posts', 'slate')),
				));
			}
		}
	}
	add_action('wp_enqueue_scripts', 'slate_load_scripts');


	/*-----------------------------------------------------------------------------------*/
	/* REGISTER THEME RECOMMENDED PLUGINS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_register_plugins')){
		function slate_register_plugins(){
			$ecko_plugins = ecko_default_plugins();
			array_push($ecko_plugins, array(
				'name' => 'Categories Images',
				'slug' => 'categories-images',
				'required' => false,
			));
			tgmpa($ecko_plugins);
		}
	}
	add_action('tgmpa_register', 'slate_register_plugins');


	/*-----------------------------------------------------------------------------------*/
	/* REGISTER SIDEBARS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_widgets_init')){
		function slate_widgets_init(){
		}
	}
	add_action('widgets_init', 'slate_widgets_init');


	/*-----------------------------------------------------------------------------------*/
	/* POST META BOX SETTINGS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_option_meta_slate_setup')){
		function slate_option_meta_slate_setup(){
			add_action('add_meta_boxes', 'slate_add_option_boxes');
			add_action('save_post', 'slate_save_option_meta', 10, 2);
		}
	}
	add_action('load-post.php', 'slate_option_meta_slate_setup');
	add_action('load-post-new.php', 'slate_option_meta_slate_setup');

	if(!function_exists('slate_add_option_boxes')){
		function slate_add_option_boxes(){
			add_meta_box(
				'slate-post-options',
				esc_html__('Theme Post Options', 'slate'),
				'slate_options_meta_box',
				'post',
				'side',
				'core'
			);
			add_meta_box(
				'slate-page-options',
				esc_html__('Theme Post Options', 'slate'),
				'slate_options_meta_box',
				'page',
				'side',
				'core'
			);
		}
	}

	if(!function_exists('slate_options_meta_box')){
		function slate_options_meta_box($object, $box){
			global $post;
			wp_nonce_field(basename(__FILE__), 'slate_subtitle');
			wp_nonce_field(basename(__FILE__), 'slate_postheader');
			wp_nonce_field(basename(__FILE__), 'slate_pagelayout');
			$slate_subtitle_meta = get_post_meta($post->ID, 'slate_subtitle', true);
			$slate_postheader_meta = get_post_meta($post->ID, 'slate_postheader', true);
			$slate_pagelayout_meta = get_post_meta($post->ID, 'slate_pagelayout', true);

		?>

			<p>
				<label>
					<?php esc_html_e("Post Subtitle", 'slate'); ?>
					<textarea class="widefat" rows="3" name="slate_subtitle" id="slate_subtitle"><?php echo esc_html($slate_subtitle_meta); ?></textarea>
				</label>
				<p class="howto"><?php esc_html_e("Set a subtitle which is shown below the post title on the post page &amp; post list.", 'slate'); ?></p>
			</p>
			<hr>
			<p>
				<strong><?php esc_html_e("Post Header", 'slate'); ?></strong><br>
				<p class="howto"><?php esc_html_e("Configure the header style within the post/custom page.", 'slate'); ?></p>
				<input type="radio" id="postheader-standard" name="slate_postheader" value="postheader-standard" <?php if(!in_array($slate_postheader_meta, array('postheader-image', 'postheader-featured', 'postheader-featured-full'))){ echo 'checked'; } ?>>
				<label for="postheader-standard"><?php esc_html_e("Standard (Minimal)", 'slate'); ?></label><br>
				<input type="radio" id="postheader-image" name="slate_postheader" value="postheader-image" <?php checked($slate_postheader_meta, 'postheader-image'); ?>>
				<label for="postheader-image"><?php esc_html_e("Image", 'slate'); ?></label><br>
				<input type="radio" id="postheader-featured" name="slate_postheader" value="postheader-featured" <?php checked($slate_postheader_meta, 'postheader-featured'); ?>>
				<label for="postheader-featured"><?php esc_html_e("Featured", 'slate'); ?></label><br>
				<input type="radio" id="postheader-featured-full" name="slate_postheader" value="postheader-featured-full" <?php checked($slate_postheader_meta, 'postheader-featured-full'); ?>>
				<label for="postheader-featured-full"><?php esc_html_e("Featured (Full Height)", 'slate'); ?></label><br>
			</p>
			<hr>
			<p>
				<strong><?php esc_html_e("Page Layout", 'slate'); ?></strong><br>
				<p class="howto"><?php esc_html_e("Configure the page layout of the individual post/custom page.", 'slate'); ?></p>
				<input type="radio" id="pagelayout-theme" name="slate_pagelayout" value="pagelayout-theme" <?php if(!in_array($slate_pagelayout_meta, array('pagelayout-fullwidth', 'pagelayout-rightsidebar', 'pagelayout-leftsidebar'))){ echo 'checked'; } ?>>
				<label for="pagelayout-theme"><?php esc_html_e("Theme Default", 'slate'); ?></label><br>
				<input type="radio" id="pagelayout-leftsidebar" name="slate_pagelayout" value="pagelayout-leftsidebar" <?php checked($slate_pagelayout_meta, 'pagelayout-leftsidebar'); ?>>
				<label for="pagelayout-leftsidebar"><?php esc_html_e("Left Sidebar", 'slate'); ?></label><br>
				<input type="radio" id="pagelayout-rightsidebar" name="slate_pagelayout" value="pagelayout-rightsidebar" <?php checked($slate_pagelayout_meta, 'pagelayout-rightsidebar'); ?>>
				<label for="pagelayout-rightsidebar"><?php esc_html_e("Right Sidebar", 'slate'); ?></label><br>
				<input type="radio" id="pagelayout-fullwidth" name="slate_pagelayout" value="pagelayout-fullwidth" <?php checked($slate_pagelayout_meta, 'pagelayout-fullwidth'); ?>>
				<label for="pagelayout-fullwidth"><?php esc_html_e("Full Width", 'slate'); ?></label><br>
			</p>
			<hr>
			<p class="howto"><?php esc_html_e("More information on these post/page options can be found within the theme documentation under 'Post Formatting'.", 'slate'); ?></p>

		<?php
		}
	}

	if(!function_exists('slate_save_option_meta')){
		function slate_save_option_meta($post_id, $post){
			$is_autosave = wp_is_post_autosave($post_id);
			$is_revision = wp_is_post_revision($post_id);

			$slate_subtitle_meta = (isset($_POST['slate_subtitle']) && wp_verify_nonce($_POST['slate_subtitle'], basename( __FILE__))) ? 'true' : 'false';
			$slate_postheader_meta = (isset($_POST['slate_postheader']) && wp_verify_nonce($_POST['slate_postheader'], basename(__FILE__))) ? 'true' : 'false';
			$slate_pagelayout_meta = (isset($_POST['slate_pagelayout']) && wp_verify_nonce($_POST['slate_pagelayout'], basename(__FILE__))) ? 'true' : 'false';

			if($is_autosave || $is_revision && !$slate_subtitle_meta && !$slate_postheader_meta && !$slate_pagelayout_meta){
				return;
			}
			if(isset($_POST['slate_subtitle'])){
				update_post_meta($post_id, 'slate_subtitle', sanitize_text_field($_POST['slate_subtitle']));
			}
			if(isset($_POST['slate_postheader'])){
				update_post_meta($post_id, 'slate_postheader', sanitize_text_field($_POST['slate_postheader']));
			}
			if(isset($_POST['slate_pagelayout'])){
				update_post_meta($post_id, 'slate_pagelayout', sanitize_text_field($_POST['slate_pagelayout']));
			}

		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* PAGINATION
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_posts_link_left_attributes')){
		function slate_posts_link_left_attributes(){
			return 'class="pagination-previous"';
		}
	}
	add_filter('next_posts_link_attributes', 'slate_posts_link_left_attributes');

	if(!function_exists('slate_posts_link_right_attributes')){
		function slate_posts_link_right_attributes(){
			return 'class="pagination-next"';
		}
	}
	add_filter('previous_posts_link_attributes', 'slate_posts_link_right_attributes');


	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM BODY CLASS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_custom_body_class')){
		function slate_custom_body_class($classes){
			$post_layout = false;
			if(is_single() || is_page()){
				global $post;
				switch(get_post_meta($post->ID, 'slate_pagelayout', true)){
					case "pagelayout-leftsidebar":
						array_push($classes, "layout-sidebar-left");
						$post_layout = true;
						break;
					case "pagelayout-rightsidebar":
						array_push($classes, "layout-sidebar-right");
						$post_layout = true;
						break;
					case "pagelayout-fullwidth":
						array_push($classes, "layout-sidebar-hidden");
						$post_layout = true;
						break;
					default:
						$post_layout = false;
						break;
				}
			}
			if(!$post_layout){
				switch(get_theme_mod('layout_sidebar', false)){
					case "sidebar-right":
						array_push($classes, "layout-sidebar-right");
						break;
					case "sidebar-hidden":
						array_push($classes, "layout-sidebar-hidden");
						break;
					default:
						array_push($classes, "layout-sidebar-left");
						break;
				}
			}
			return $classes;
		}
	}
	add_filter('body_class', 'slate_custom_body_class');


	/*-----------------------------------------------------------------------------------*/
	/* DEFAULT WIDGETS
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_get_default_widget_options')){
		function slate_get_default_widget_options(){
			return array(
				'before_widget' => '<section class="widget">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3><hr>'
			);
		}
	}

	if(!function_exists('slate_get_default_widgets')){
		function slate_get_default_widgets(){
			if(class_exists('ecko_widget_blog_info')){ the_widget('ecko_widget_blog_info', '', array()); }
			the_widget('WP_Widget_Search', '', slate_get_default_widget_options());
			if(class_exists('ecko_widget_blog_info')){ the_widget('ecko_widget_navigation', '', array()); }
			if(class_exists('ecko_widget_latest_posts')){ the_widget('ecko_widget_latest_posts', array('title' => esc_attr__('Latest Posts', 'slate'), 'postcount' => 7)); }
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* COMMENT FORMATTING
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_comment_format')){
		function slate_comment_format($comment, $args, $depth){
			$GLOBALS['comment'] = $comment;
			?>
				<li <?php comment_class(); ?> id="comment-<?php echo esc_attr(comment_ID()); ?>">
					<div class="contents">
						<div class="profile">
							<a href="<?php comment_author_url(); ?>"><img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=124" class="gravatar" alt="<?php comment_author(); ?>"></a>
						</div>
						<div class="main">
							<div class="commentinfo">
								<section class="meta">
									<div class="left">
										<h4 class="author"><a href="<?php comment_author_url(); ?>"><img src="https://0.gravatar.com/avatar/<?php echo esc_attr(md5($comment->comment_author_email)); ?>?s=24" class="gravatarsmall" alt="<?php comment_author(); ?>"><?php comment_author(); ?></a></h4>
										<span class="isauthor" title="Author"><i class="fa fa-user"></i><?php esc_attr_e('Author', 'slate'); ?></span>
										<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
									</div>
									<div class="right">
										<div class="info"><time datetime="<?php comment_date('Y-m-d'); ?>"><?php comment_date(get_option('date_format')); ?></time></div>
									</div>
								</section>
							</div>
							<div class="body">
								<?php comment_text(); ?>
							</div>
							<hr>
						</div>
					</div>
			<?php
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET DEFAULT BACKGROUND
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_get_default_background_image')){
		function slate_get_default_background_image(){
			return get_theme_mod('layout_header_background', '');
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POST LIST CLASSES
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_get_post_list_classes')){
		function slate_get_post_list_classes(){
			$classes = "post-list";
			if(get_theme_mod('postlist_layout', 'default') == "single-column"){
				$classes .= " post-list-single-column";
			}
			return $classes;
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POST SUBTITLE
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_get_post_subtitle')){
		function slate_get_post_subtitle(){
			global $post;
			global $wp_query;
			if(get_post_meta($post->ID, 'slate_subtitle', true) !== ""){
				if(is_home() && !is_paged() && $wp_query->current_post == 0){
					return ecko_truncate_by_words(get_post_meta($post->ID, 'slate_subtitle', true), 160, '...');
				}else{
					return ecko_truncate_by_words(get_post_meta($post->ID, 'slate_subtitle', true), 105, '...');
				}
			}else{
				return ecko_truncate_by_words(get_the_excerpt(), 105, '...');
			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET POST CATGEORY MARKUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_get_category')){
		function slate_get_category($usespan = false){
			global $post;
			$post_category = get_the_category();
			if($post_category){
				if($usespan){
					echo esc_html($post_category[0]->name);
				}else{
					echo "<a href=\"" . esc_url(get_category_link($post_category[0]->term_id)) . "\" class=\"post-category\">" . esc_html($post_category[0]->name) . "</a>";
				}

			}
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* GET DEFAULT HEADER BACKGROUND
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_get_header_background')){
		function slate_get_header_background(){
			return get_theme_mod('layout_header_background', '');
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/* MODIFY DEFAULT WIDGET MARKUP
	/*-----------------------------------------------------------------------------------*/

	if(!function_exists('slate_list_categories')){
		function slate_list_categories($links){
			$links = str_replace('</a> (', '</a> <span class="count">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
	}
	add_filter('wp_list_categories', 'slate_list_categories');

	if(!function_exists('slate_list_archives')){
		function slate_list_archives($links){
			$links = str_replace('</a> (', '</a> <span class="count">', $links);
			$links = str_replace(')', '</span>', $links);
			return $links;
		}
	}
	add_filter('wp_list_archives', 'slate_list_archives');


	/*-----------------------------------------------------------------------------------*/
	/* THEME CUSTOMIZER SETTINGS
	/*-----------------------------------------------------------------------------------*/

	function slate_customize_register($wp_customize){

		/*
		 * Layout
		 */
		$wp_customize->add_section('layout_section',
			array(
				'title' => esc_attr__('Layout', 'slate'),
				'description' => esc_attr__('This section contains theme layout options.', 'slate'),
				'priority' => 23,
			)
		);

		$wp_customize->add_setting('layout_header_background',
		array(
			'sanitize_callback' => 'ecko_sanitize_file_upload'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'layout_header_background',
				array(
					'label' => esc_attr__('Default Header Background Image', 'slate'),
					'section' => 'layout_section',
					'settings' => 'layout_header_background'
				)
			)
		);

		$wp_customize->add_setting('layout_sidebar',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => "sidebar-left",
		));
		$wp_customize->add_control(
			'layout_sidebar',
			array(
				'type' => 'radio',
				'label' => esc_attr__('Sidebar Position', 'slate'),
				'section' => 'layout_section',
				'choices' => array(
					"sidebar-left" => 'Left Sidebar',
					"sidebar-hidden" => 'Hidden',
					"sidebar-right" => 'Right Sidebar'
				),
			)
		);

		$wp_customize->add_setting('layout_disable_sticky_sidebar',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('layout_disable_sticky_sidebar',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Disable Sticky Sidebar', 'slate'),
				'section' => 'layout_section',
			)
		);

		$wp_customize->add_setting('layout_disable_lightbox',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('layout_disable_lightbox',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Disable Lightbox', 'slate'),
				'section' => 'layout_section',
			)
		);



		/*
		 * POST LIST SECTION
		 */
		$wp_customize->add_section('postlist_section',
			array(
				'title' => esc_attr__('Post List', 'slate'),
				'description' => esc_attr__('This section contains Post List options.', 'slate'),
				'priority' => 27,
			)
		);

		$wp_customize->add_setting('postlist_layout',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html',
			'default' => "default",
		));
		$wp_customize->add_control('postlist_layout',
			array(
				'type' => 'radio',
				'label' => esc_attr__('Post Layout', 'slate'),
				'section' => 'postlist_section',
				'choices' => array(
					"default" => 'Default',
					"single-column" => 'Single Column',
				),
			)
		);

		$wp_customize->add_setting('postlist_custom_opacity',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_custom_opacity',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Enable Post Custom Opacity (Below)', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_first_post_background_opacity',
		array(
			'sanitize_callback' => 'ecko_sanitize_int',
			'default' => 30
		));
		$wp_customize->add_control('postlist_first_post_background_opacity', array(
			'type' => 'range',
			'section' => 'postlist_section',
			'label' => 'First Post Background Opacity',
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1
			),
		));

		$wp_customize->add_setting('postlist_post_background_opacity',
		array(
			'sanitize_callback' => 'ecko_sanitize_int',
			'default' => 50
		));
		$wp_customize->add_control('postlist_post_background_opacity', array(
			'type' => 'range',
			'section' => 'postlist_section',
			'label' => 'Default Posts Background Opacity',
			'input_attrs' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1
			),
		));

		$wp_customize->add_setting('postlist_post_background_blend',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_post_background_blend',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Disable Post Background Blend', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_category',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Category', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_author',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_date',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Date', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_show_read_time',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_show_read_time',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Show Read Time', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_meta',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Meta', 'slate'),
				'section' => 'postlist_section',
			)
		);

		$wp_customize->add_setting('postlist_hide_subtitle',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postlist_hide_subtitle',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Subtitle', 'slate'),
				'section' => 'postlist_section',
			)
		);


		/*
		 * SUBSCRIPTION SECTION
		 */
		$wp_customize->add_section('subscription_section',
			array(
				'title' => esc_attr__('Post List - Subscription', 'slate'),
				'description' => esc_attr__('This section contains inline post list subscription options.', 'slate'),
				'priority' => 27,
			)
		);

		$wp_customize->add_setting('subscription_enabled',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('subscription_enabled',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Enabled', 'slate'),
				'section' => 'subscription_section',
			)
		);

		$wp_customize->add_setting('subscription_title',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('subscription_title',
			array(
				'label' => esc_attr__('Title', 'slate'),
				'section' => 'subscription_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('subscription_description',
		array(
			'sanitize_callback' => 'ecko_sanitize_text'
		));
		$wp_customize->add_control('subscription_description',
			array(
				'label' => esc_attr__('Description', 'slate'),
				'section' => 'subscription_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting('subscription_embed_code',
		array(
			'sanitize_callback' => 'ecko_sanitize_allow_html'
		));
		$wp_customize->add_control('subscription_embed_code',
			array(
				'label' => esc_attr__('MailChimp Embed Code', 'slate'),
				'section' => 'subscription_section',
				'type' => 'text',
			)
		);



		/*
		 * PAGINATION SECTION
		 */
		$wp_customize->add_section('pagination_section',
			array(
				'title' => esc_attr__('Pagination', 'slate'),
				'description' => esc_attr__('This section contains Pagination options.', 'slate'),
				'priority' => 28,
			)
		);

		$wp_customize->add_setting('pagination_disbale_infinite_loading',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_disbale_infinite_loading',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Disable Infinite Loading', 'slate'),
				'section' => 'pagination_section',
			)
		);

		$wp_customize->add_setting('pagination_hide_older_newer',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_hide_older_newer',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide \'Older/Newer\' Buttons', 'slate'),
				'section' => 'pagination_section',
			)
		);

		$wp_customize->add_setting('pagination_hide_page_numbers',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('pagination_hide_page_numbers',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Page Numbers', 'slate'),
				'section' => 'pagination_section',
			)
		);


		/*
		 * POST PAGE SECTION
		 */
		$wp_customize->add_section('postpage_section',
			array(
				'title' => esc_attr__('Post Page', 'slate'),
				'description' => esc_attr__('This section contains Post Page options.', 'slate'),
				'priority' => 29,
			)
		);

		$wp_customize->add_setting('postpage_hide_category',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_category',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Category', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_author',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_author',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_date',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_date',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Date', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_show_read_time',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_show_read_time',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Show Read Time', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_tags',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_tags',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Tags', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_related',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_related',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Related Posts', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_author_profile',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_author_profile',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Author Profile', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_comments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_comments',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comments', 'slate'),
				'section' => 'postpage_section',
			)
		);

		$wp_customize->add_setting('postpage_hide_next_prev_posts',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('postpage_hide_next_prev_posts',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide \'Next/Previous\' Posts', 'slate'),
				'section' => 'postpage_section',
			)
		);


		/*
		 * CUSTOM PAGE SECTION
		 */
		$wp_customize->add_setting('custompage_hide_title',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_title',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Page Title', 'slate'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_section('custompage_section',
			array(
				'title' => esc_attr__('Custom Page', 'slate'),
				'description' => esc_attr__('This section contains Custom Page options.', 'slate'),
				'priority' => 30,
			)
		);

		$wp_customize->add_setting('custompage_show_author_profile',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_author_profile',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Show Author Profile', 'slate'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_show_meta',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_meta',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Show Meta', 'slate'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_show_read_time',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_show_read_time',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Show Read Time', 'slate'),
				'section' => 'custompage_section',
			)
		);

		$wp_customize->add_setting('custompage_hide_comments',
		array(
			'sanitize_callback' => 'ecko_sanitize_checkbox'
		));
		$wp_customize->add_control('custompage_hide_comments',
			array(
				'type' => 'checkbox',
				'label' => esc_attr__('Hide Comments', 'slate'),
				'section' => 'custompage_section',
			)
		);

	}
	add_action('customize_register', 'slate_customize_register');


	function slate_customize_css(){
		?>
			<style type="text/css">

				<?php // GENERAL ?>
				<?php if(get_theme_mod('general_disqus_plugin_support')){ ?>
					.meta .comments{ display: none !important; }
				<?php } ?>

				<?php // POSTLIST ?>
				<?php if(get_theme_mod('postlist_custom_opacity') && get_theme_mod('postlist_first_post_background_opacity')){ ?>
					.post-list .post-item-featured .post-background{ opacity: <?php echo esc_attr(get_theme_mod('postlist_first_post_background_opacity')) / 100; ?> !important; -webkit-animation: none !important; -moz-animation: none !important; animation: none !important; }				<?php } ?>
				<?php if(get_theme_mod('postlist_custom_opacity') && get_theme_mod('postlist_post_background_opacity')){ ?>
					.post-list .post-item-default .post-background{ opacity: <?php echo esc_attr(get_theme_mod('postlist_post_background_opacity')) / 100; ?> !important; -webkit-animation: none !important; -moz-animation: none !important; animation: none !important; }				<?php } ?>
				<?php if(get_theme_mod('postlist_post_background_blend')){ ?>
					.post-list .post-item-default .post-background{ background-blend-mode: inherit; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_category')){ ?>
					.post-list .post-item .post-meta .post-category{ display: none; }
					.post-list .post-item .post-meta li:nth-child(2):before{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_author')){ ?>
					.post-list .post-item .post-meta .post-author{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_date')){ ?>
					.post-list .post-item .post-meta .post-date{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_show_read_time')){ ?>
					.post-list .post-item .post-meta .post-read-time{ display: inline-block; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_meta')){ ?>
					.post-list .post-item .post-meta{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postlist_hide_subtitle')){ ?>
					.post-list .post-item .post-subtitle{ display: none; }
				<?php } ?>

				<?php // PAGINATION ?>
				<?php if(get_theme_mod('pagination_hide_older_newer')){ ?>
					.pagination .pagination-previous, .pagination .pagination-next{ display: none !important; }
				<?php } ?>
				<?php if(get_theme_mod('pagination_hide_page_numbers')){ ?>
					.pagination ul.page-numbers{ display: none !important; }
				<?php } ?>

				<?php // POST PAGE ?>
				<?php if(get_theme_mod('postpage_hide_category')){ ?>
					body.single .post-category{ display: none !important; }
					body.single .post-header .post-meta li:nth-child(2):before{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_author')){ ?>
					body.single .post-header .post-meta .post-author{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_date')){ ?>
					body.single .post-header .post-meta .post-date{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_show_read_time')){ ?>
					body.single .post-header .post-meta .post-read-time{ display: inline-block; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_tags')){ ?>
					body.single .post-footer .tags{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_related')){ ?>
					body.single .post-related{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_author_profile')){ ?>
					body.single .author-profile{ display: none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_comments')){ ?>
					body.single .post-comments{ display:none; }
				<?php } ?>
				<?php if(get_theme_mod('postpage_hide_next_prev_posts')){ ?>
					body.single .post-next{ display: none; }
				<?php } ?>

				<?php // CUSTOM PAGE ?>
				<?php if(get_theme_mod('custompage_hide_title')){ ?>
					body.page .post-header{ display: none !important; }
					body.page .postcontents { margin: 8% auto 5%; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_show_author_profile')){ ?>
					body.page .page-content .author-profile{ display: block; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_show_meta')){ ?>
					body.page .post-header .post-info .post-meta{ display: block; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_show_read_time')){ ?>
					body.page .post-header .post-info .post-meta .post-read-time{ display: block; }
				<?php } ?>
				<?php if(get_theme_mod('custompage_hide_comments')){ ?>
					body.page .post-comments{ display: none; }
					body.page .postcontents{ margin-bottom: 10%; }
				<?php } ?>

				<?php // COPYRIGHT ?>
				<?php if(get_theme_mod('copyright_hide_disclaimer')){ ?>
					.widget.copyright{ display: none !important; }
				<?php } ?>
				<?php if(get_theme_mod('copyright_hide_wordpress')){ ?>
					.widget.copyright .wordpress{ display: none !important; }
				<?php } ?>
				<?php if(get_theme_mod('copyright_hide_ecko')){ ?>
					.widget.copyright .ecko{ display: none !important; }
				<?php } ?>

				<?php // COLORS ?>
				<?php if(get_theme_mod('color_enable_custom')){ ?>
					.post-item:hover .post-meta .post-category{ border-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; background-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.widget .searchform .fa-search:hover { background-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.widget.subscribe .subscribe-submit:hover { background-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.post-header .post-info .post-meta .post-category a{ border-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; background-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.post-footer .post-category{ background-color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
					.postcontents a{ color: <?php echo esc_attr(get_theme_mod('color_accent')); ?>; }
				<?php } ?>

			 </style>
		<?php
	}
	add_action('wp_head', 'slate_customize_css');
