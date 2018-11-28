<?php
/**
 * The Header for our theme
 *
 * @package WordPress
 * @subpackage GNU-Blog-WordPress-Theme
 * @since GNU Blog WordPress Theme 1.0.0
 */

// SET DEFAULT PAGE IMAGE
$GLOBALS['pageImage'] = get_template_directory_uri() . "/_/img/social-share.jpg";
// GET THE PAGE DESCRIPTION, AND IMAGE IF IT'S SINGLE
if (is_single()){
	if (have_posts()){
		while (have_posts()){
			the_post();
			// set page thumbnail now that we know we have a single post, used for FB likes
			$GLOBALS['pageImage'] = get_post_image('medium');
			$GLOBALS['pageImage'] = $GLOBALS['pageImage'][0];
		}
	}
}

?><!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!--
                G                                           GGGGGGGGGGG
               GGG          GGGGGGGGGGGGGGGGGGGGGGGGGG   GGGGGGGGGGGGGGGGG
              GGGGG         GGGGGGGGGGGGGGGGGGGGGGGGGG GGGGGGGGGGGGGGGGGGGGGG
             GGG GGG        GG        GGGGGGGG     GGGGGG    GGGGGGGGG    GGG
            GGG   GGG       GG         GGGGGGG     GGGGGG    GGGGGGGGG    GGGG
           GGG     GGG      GG          GGGGGG     GGGGGG    GGGGGGGGG    GGGGG
          GGG       GGG     GG           GGGGG     GGGGGG    GGGGGGGGG    GGGGG
         GGG    G    GGG    GG     G      GGGG     GGGGGG    GGGGGGGGG    GGGGGG
        GGG    GGG    GGG   GG     GG      GGG     GGGGGG    GGGGGGGGG    GGGGGG
       GGG    GGGGGGGGGGGG  GG     GGG      GG     GGGGGG    GGGGGGGGG    GGGGGG
      GGG    GGGGGGGGGGGGGG GG     GGGG      G     GGGGGG    GGGGGGGGG    GGGGG
     GGG    GGG         GGGGGG     GGGGG           GGGGGG    GGGGGGGGG    GGGGG
    GGG    GGGGGGGGGGG   GGGGG     GGGGGG          GGGGGG     GGGGGGG     GGGG
   GGG    GGGGGGGGGGGGG   GGGG     GGGGGGG         GGGGGGG     GGGGG     GGGGG
  GGG                      GGG     GGGGGGGG        GGGGGGGG             GGGGG
 GGG                        GG     GGGGGGGGG       GGG  GGGGGGG     GGGGGGG
GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG     GGGGGGGGGGGGGG
GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG         GGGGGG

               - HANDBUILT IN THE USA BY SNOWBOARDERS WITH JOBS -
-->
<head id="www-gnu-com" data-template-set="gnu-blog-wordpress-theme">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5FRBJ7M');</script>
	<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
	<meta name="author" content="GNU" />
	<meta name="Copyright" content="Copyright GNU <?php echo date('Y'); ?>. All Rights Reserved." />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="google-site-verification" content="xxx" />
	<meta name="google-site-verification" content="xxx" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/_/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/_/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/_/img/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/_/img/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/_/img/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php include '_/inc/header-includes.php' ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/_/js/lib/respond-1.4.2.min.js"></script>
	<link href="http://cdn.gnu.com/respond-proxy/" id="respond-proxy" rel="respond-proxy" />
	<link href="<?php echo get_template_directory_uri(); ?>/_/img/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
	<script src="<?php echo get_template_directory_uri(); ?>/_/js/lib/respond.proxy.js"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FRBJ7M"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="wrapper">
		<header>
			<div class="header-wrapper">
				<div class="logos-wrapper" itemscope itemtype="https://schema.org/Organization">
					<a href="https://www.gnu.com" id="logo" class="site-title" rel="home" itemprop="url">
						<img src="<?php echo get_template_directory_uri(); ?>/_/img/gnu-logo.jpg" alt="gnu logo" />
					</a>
				</div><!-- .logos-wrapper -->
				<a class="screen-reader-text skip-link" href="#content">Skip to content</a>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main_menu',
							'menu_class' => 'nav-menu'
						)
					);
				?>

				<div class="search-toggle-wrapper">
					<a href="#search" class="search-toggle"></a>
				</div>
				<div class="search ">
					<?php get_search_form(); ?>
				</div>
			</div><!-- .header-wrapper -->
		</header><!-- .site-header -->
