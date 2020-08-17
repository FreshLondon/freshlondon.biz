<?
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FreshLondon
 */
?><!DOCTYPE html>
<html <? language_attributes(); ?>>
    <head>
        <meta charset="<? bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<? bloginfo('pingback_url'); ?>">
        <? wp_head(); ?>
    </head>
    

    <body <? body_class(); ?>>
        <div id="page" class="site">

            <header id="masthead" class="site-header" role="banner">

                <? # get_template_part( 'components/header/header', 'image' );  ?>
                <? freshlondon_the_custom_logo(); ?>

                <a class="skip-link screen-reader-text" href="#content"><? esc_html_e('Skip to content', 'freshlondon'); ?></a>

                <div id="site-navigation-wrap">
                    <? get_template_part('components/navigation/navigation', 'top'); ?>
                </div>

            </header>
            <div id="content" class="site-content">
