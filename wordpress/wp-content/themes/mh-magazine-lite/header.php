<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if (is_singular() && pings_open(get_queried_object())) : ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body id="mh-mobile" <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php mh_before_header();
get_template_part('content', 'header');
mh_after_header(); ?>