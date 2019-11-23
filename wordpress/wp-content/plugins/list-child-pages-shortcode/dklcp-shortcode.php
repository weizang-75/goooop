<?php
/**
Plugin Name: List Child Pages Shortcode
Plugin URI: https://martech.zone/list-child-pages-shortcode/
Description: Provides a shortcode to list child pages on a parent page with an optional featured image and excerpt for the child page description. Usage: [listchildpages ifempty="No child pages" orderby="publish_date" order="desc" displayimage="YES" align="alignleft" ulclass="" liclass="" aclass=""]Here are our child pages:[/listchildpages]
Version: 1.3.1
Author: Douglas Karr
Author URI: https://dknewmedia.com/
License: GPL2
Text Domain: listchildpages-shortcode

	Copyright 2019 Douglas Karr (email: info@dknewmedia.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**/

add_post_type_support( 'page', 'excerpt' );

function dklcp_listchildpages( $atts, $content = "" ) { 
 	global $post; 
 	$string = '';
 	
 	$atts = shortcode_atts( array(
 			'ifempty' => '<p>No Records</p>',
 			'order' => 'DESC',
 			'orderby' => 'publish_date',
 			'ulclass' => '',
 			'liclass' => '',
 			'aclass' => '',
 			'displayimage' => 'no',
 			'align' => 'alignleft'
 	), $atts, 'listchildpages' );
 	
 	$args = array(
 	    'post_type'     	=> 'page',
 	    'posts_per_page'	=> -1,
 	    'post_parent'   	=> $post->ID,
 	    'orderby' 			=> $atts['orderby'],
 	    'order' 			=> $atts['order']
 	);
 	
 	$parent = new WP_Query( $args );
 	
 	if ( $parent->have_posts() ) {
 	
 		$string .= $content.'<ul class="'.$atts['ulclass'].'">';
 		
 		while ( $parent->have_posts() ) : $parent->the_post();
 			$string .= '<li class="'.$atts['liclass'].'">';
 			
 			// Display the featured image?
 			$true = array("y","yes","t","true");
 			$showimage = strtolower($atts['displayimage']);
 			
 			// Build the image into the list item
 			if(in_array($showimage, $true)) {
 				if (has_post_thumbnail( $post->ID )) {
 					$image_attributes = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail'); 
 					$string .= '<a class="'.$atts['aclass'].'" href="'.get_permalink().'" title="'.get_the_title().'">';
 					$string .= '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" alt="'.get_the_title().'" class="'.$atts['align'].'" /></a>';
 				}
 			}
 			
 			// Build the anchor tag
 			$string .= '<a class="'.$atts['aclass'].'" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
 			if ( has_excerpt( $post->ID ) ) {
 			 	$string .= ' - '.get_the_excerpt();
 			}
 			$string .= '</li>';
 		
 		endwhile;
 		
 		$string .= '</ul>';
 		
	} else {
	
		$string = $atts['ifempty'];
		
	}
	
	wp_reset_postdata();
	
	return $string;
 }

add_shortcode('listchildpages', 'dklcp_listchildpages');

?>