<?php
/**
 * @package WordPress
 * @subpackage Mondrian
 */

function hj_breadcrumb() {
  if ( function_exists('yoast_breadcrumb') && !is_home() && !is_post_type_archive() ) {
    yoast_breadcrumb('<p class="small">','</p>');
  }
}

// page data to pass into javascript
$page_data = (object)[
  'isSingle' => is_single(),
    'isHome' => is_home(),
    'isArchive' => is_archive(),
    'bodyClasses' => get_body_class(),
];

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(' &bull; ',true,'right'); bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/css/main.css?v=1.0" />
    <script>
     window.pageData = <?php echo json_encode($page_data); ?>;
    </script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrap">
      <header id="header" class="row">
        <!-- <a href="/" class="logo"><img src="<?php echo bloginfo('template_directory'); ?>/img/jw-hh-logo.png" height="90" width="260" alt="<?php bloginfo('name'); ?>"/></a> -->
        <a href="/" class="site-logo">
          <?php echo file_get_contents( get_template_directory() . '/img/filters.svg'); ?>
          <?php echo file_get_contents( get_template_directory() . '/img/Holly-Harper-logo-full.svg'); ?>
        </a>

        <div id="main-nav"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '', 'menu_id' => '', 'container' => '' ) ); ?></div>
        <div id="breadcrumbs"><?php hj_breadcrumb(); ?></div>
        <div id="tagline"><?php bloginfo('description'); ?></div>
      </header><!-- #header -->

