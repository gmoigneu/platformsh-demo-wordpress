
jQuery(document).ready(function() {
	"use strict";


	(function(){
		configureHighlighter();
		configureComments();
		configureLayoutBorder();
		configureNavigation();
		configureSubscribeWidget();
		configureInfiniteLoading();
		if(window.innerWidth > 1300){
			configureSidebar();
			setTimeout(function() {
				jQuery(window).scrollTop(jQuery(window).scrollTop() + 1);
			}, 100);
		}
	})();

	jQuery(window).load(function(){

	});


	// VIEWPORT RESIZE

 	jQuery(window).resize(function() {
		if(this.resizeTO) clearTimeout(this.resizeTO);
		this.resizeTO = setTimeout(function() {
			jQuery(this).trigger('resizeEnd');
		}, 500);
	});

	jQuery(window).bind('resizeEnd', function() {
		if(window.innerWidth < 1300){
			jQuery('.page-sidebar-sticky').trigger("sticky_kit:detach");
			if(jQuery('.page-sidebar').height() < jQuery('.page-content')){
				jQuery('.page-sidebar').css('height', window.innerHeight);
			}
		}
		if(window.innerWidth > 1300){
			configureSidebar();
			sidebarClose();
		}
	});


	// COMMENTS

	function configureComments(){
		if(ecko_theme_vars.general_hidecomments == "1"){
			jQuery('.comments-show').show();
			jQuery('.post-comments').hide();
			jQuery('.comments-show').on('click', function(){
				jQuery('.comments-show').slideUp();
				jQuery('.post-comments').slideDown();
			});
		}
	}


	// SYNTAX HIGHLIGHTER

	function configureHighlighter(){
		if(ecko_theme_vars.general_disable_syntax_highlighter !== "1"){
			Rainbow.color();
		}
	}


	// TOGGLE SIDEBAR

	jQuery('.toggle-sidebar').click(function(){
		if(jQuery('.page-content').hasClass('sidebar-open')){
			sidebarClose();
		}else{
			sidebarOpen();
		}
	});

	jQuery('.sidebar-close').click(function(){
		sidebarClose();
	});

	function sidebarClose(){
		if(jQuery('.page-content').hasClass('sidebar-open')){
			jQuery('.toggle-sidebar i').removeClass('fa-close').addClass('fa-navicon');
			jQuery('.page-content').removeClass('sidebar-open');
			jQuery('.page-sidebar').removeClass('sidebar-open');
			jQuery('.header-mobile').removeClass('sidebar-open');
		}
	}

	function sidebarOpen(){
		if(!jQuery('.page-content').hasClass('sidebar-open')){
			jQuery('.toggle-sidebar i').removeClass('fa-navicon').addClass('fa-close');
			jQuery('.page-wrapper').addClass('sidebar-open');
			jQuery('.page-content').addClass('sidebar-open');
			jQuery('.page-sidebar').addClass('sidebar-open');
			jQuery('.header-mobile').addClass('sidebar-open');
		}
	}


	// STICKY SIDEBAR

	function configureSidebar(){
		if(ecko_theme_vars.layout_disable_sticky_sidebar !== "1"){
			if(!jQuery('body').hasClass('layout-sidebar-hidden')){
				if(jQuery('.page-sidebar').height() < jQuery('.page-content').height()){
					jQuery('.page-sidebar').css('height', window.innerHeight);
				}
				jQuery('.page-sidebar-sticky').stick_in_parent({
					bottoming: false
				});
			}
		}
	}


	// SIDEBAR BORDER

	function configureLayoutBorder(){
		if(jQuery('.page-content').height() > jQuery('.page-sidebar').height()){
			if(jQuery('body').hasClass('layout-sidebar-right')){
				jQuery('.page-wrapper').css('border-right', '1px solid #f0f0f1');
			}else{
				jQuery('.page-wrapper').css('border-left', '1px solid #f0f0f1');
			}
			jQuery('.page-sidebar').css('border', '0');
		}
	}


	// NAVIGATION ARROWS

	function configureNavigation(){
		jQuery('.widget.navigation li.menu-item-has-children > a').each(function(){
			jQuery(this).html(jQuery(this).text() + '<i class="fa fa-chevron-down"></i>');
		});
	}

	jQuery('.widget.navigation li.menu-item-has-children > a').on( "click", function(){
		var parent = jQuery(this).parent();
		jQuery('a i', parent).toggleClass('fa-chevron-down');
		jQuery('a i', parent).toggleClass('fa-chevron-up');
		jQuery('.sub-menu', parent).slideToggle(function(){
			jQuery('.page-sidebar-sticky').trigger("sticky_kit:recalc");
		});
		return false;
	});

	jQuery('li.menu-item-has-children').on( "click", "a", function(){
		if(jQuery(this).attr('href') == "#"){
			return false;
		}
	});


	// SEARCH SUBMIT

	jQuery('.searchform .submit').click(function(){
		jQuery(this).parent('form').submit();
	});


	// WIDGET - SUBCRIBE

	function configureSubscribeWidget(){
		jQuery('.required.email').attr('placeholder', ecko_theme_vars.localization_email_address + '...');
		jQuery('.widget.subscribe .inner form').append('<i class="fa fa-envelope-o subscribe-icon"></i><i class="fa fa-arrow-right subscribe-submit"></i>');
		jQuery('.post-item-subscribe .post-info form').append('<i class="fa fa-arrow-right subscribe-submit"></i>');
		jQuery('.subscribe-submit').click(function(){
			jQuery(this).parent('form').submit();
		});
	}


	// INFINITE LOADING

	function configureInfiniteLoading(){
		if(ecko_theme_vars.pagination_disable_infinite_loading !== "1"){
			jQuery('.pagination-default').hide();
			jQuery('.pagination-infinite').show();
			if(jQuery('.pagination').length > 0){
				if(jQuery('.pagination-previous').length > 0){
					var waypoint = new Waypoint({
						element: jQuery('.pagination')[0],
						handler: function(direction){
							if(direction == "down"){ loadPosts(); }
						},
						offset: '100%'
					});
				}else{
					jQuery('.pagination-ajax').html("<i class=\"fa fa-info\"></i> " + ecko_theme_vars.localization_no_more_posts);
				}
			}
		}
	}

	function loadPosts(callback){
		if(jQuery('.pagination-previous').length > 0){
			jQuery.get(jQuery(".pagination-previous").attr('href'), function(data){
				var result = jQuery(data).find('.post-item');
				var nextpage = jQuery(data).find(".pagination-previous").attr('href');
				jQuery(result).addClass('post-item-new');
				jQuery('.post-list-container').append(result);
				jQuery('.post-item-subscribe').not(':first').remove();
				Waypoint.refreshAll();
				jQuery('.post-item-new').each(function(index){
					var currentitem = this;
					setTimeout(function(){
						jQuery(currentitem).css('opacity', 1);
						jQuery(currentitem).removeClass('post-item-new');
					}, 250 * index);
				});
				if(nextpage !== undefined){
					jQuery(".pagination-previous").attr('href', nextpage);
				}else{
					jQuery(".pagination-previous").remove();
					jQuery('.pagination-ajax').html("<i class=\"fa fa-info\"></i> " + ecko_theme_vars.localization_no_more_posts);
				}
			});
		}
	}


	// FITVIDS

	jQuery('.postcontents').fitVids();


	// LIGHTBOX

	jQuery('.postcontents-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom',
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});

	jQuery('.postcontents a').each(function(){
		if(jQuery(this).attr('href').match(/\.(jpg|png|gif)/g)){
			jQuery(this).magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				fixedContentPos: true,
				mainClass: 'mfp-no-margins mfp-with-zoom',
				image: {
					verticalFit: true
				},
				gallery: {
					enabled:true
				},
				zoom: {
					enabled: true,
					duration: 300
				}
			});
		}
	});

	jQuery('.eckogallery, .gallery').each(function() {
		jQuery(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			mainClass: 'mfp-no-margins mfp-with-zoom',
			gallery: {
				enabled: true
			},
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300
			}
		});
	});


	// GALLERY

	jQuery(".postcontents .eckogallery").justifiedGallery({
		rowHeight: 160,
		maxRowHeight: 220,
		margins: 3,
		border: 0,
		lastRow: 'justify',
		captions: false,
		cssAnimation: true,
		imagesAnimationDuration: 300
	});


});
