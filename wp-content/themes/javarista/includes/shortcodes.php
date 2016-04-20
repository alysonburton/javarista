<?php

/*-----------------------------------------------------------------------------------------------------//	
	PrettyPhoto Lightbox Gallery Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_gallery_shortcode($attr) {
	global $post, $wp_locale;
	static $instance = 0;
	$instance++;
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
	extract(shortcode_atts(array(
		'order'	  => 'ASC',
		'orderby'	=> 'menu_order ID',
		'id'		 => $post->ID,
		'itemtag'	=> 'dl',
		'icontag'	=> 'dt',
		'captiontag' => 'dd',
		'columns'	=> 3,
		'size'	   => 'thumbnail',
		'include'	=> '',
		'exclude'	=> ''
	), $attr));
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';
	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
	if ( empty($attachments) )
		return '';
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";
	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		// Adding prettyPhoto rel
		$link = str_replace("<a","<a rel=\"prettyPhoto[pp_gal]\" ",$link);
		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}
	$output .= "
			<br style='clear: both;' />
		</div>\n";
	return $output;
}
add_shortcode('bear_gallery', 'bear_gallery_shortcode');

/*-----------------------------------------------------------------------------------------------------//	
	Toggle Box Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_toggle( $atts, $content = null ) {

    extract(shortcode_atts(array(
    	'title'	=> 'Toggle Item',
   	), $atts));
	
	$out = '
		<div class="toggle-box">
		<p class="toggle-trigger"><a href="javascript:void(0);">' .$title. '</a></p>
		<div class="toggle-section"><p>' .do_shortcode($content). '</p></div>
		</div>';

    return $out;
}
add_shortcode('toggle', 'bear_toggle');

/*-----------------------------------------------------------------------------------------------------//	
	Horizontal Rating Bar Shortcode	       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_rating($atts) {  
    extract(shortcode_atts(array(
    	"title" => '',  
        "number" => '50'  
    ), $atts));  
    return 
    '<div class="rating-container">
    	<p class="rating-title">'.$title.'</p>
    	<div class="bar-rating"><span style="width:'.$number.'%;"></span></div>
    </div>';  
}
add_shortcode("rating", "bear_rating");

/*-----------------------------------------------------------------------------------------------------//	
	Modal Box Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_modal( $atts, $content = null ) {

    extract(shortcode_atts(array(
    	'title'	=> 'Open Modal',
    	'tag'	=> 'bear-modal',
	    'color'	=> '',
	    'size'	=> '',
	    'align'	=> '',
    ), $atts));

	$style = ($color) ? ' '.$color.'-btn' : '';
	$align = ($align) ? ' align-'.$align : '';
	
	$out = '
		<div class="modal-btn '.$align.'"><a class="bear-btn '.$style.' '.$size.'-btn '.$align.'" href="#'.$tag.'" rel="modal:open"><span class="btn-holder">' .$title. '</span></a></div>
		<div id="' .$tag. '" class="bear-modal" style="display: none;"><span class="modal-title">' .$title. '</span>' .do_shortcode($content). '</div>';

    return $out;
}
add_shortcode('modal', 'bear_modal');

/*-----------------------------------------------------------------------------------------------------//	
	Accordion Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_accordion($atts, $content = null) {
    extract(shortcode_atts(array(
        "collapsible" => "false"
    ), $atts));

    $GLOBALS["section_count"] = 0;
    // Get the content
    do_shortcode($content);
    // Generate output
    if (is_array( $GLOBALS["sections"] )) {
        foreach ($GLOBALS["sections"] as $section) {
            $panes[] = '<p><a href="#'. str_replace(" ", "-", strtolower($section["name"])) .'">'. $section["name"] .'</a></p>
            <div id="'. str_replace(" ", "-", strtolower($section["name"])) .'">
            	'. do_shortcode($section["content"]) .'
            </div>';
        }
    }
    $output = '
    <div class="bear-accordion">'. implode("", $panes) .'</div>';
        
    return $output;
}
add_shortcode("accordion", "bear_accordion");

function bear_accordion_section($atts, $content = null) {
    extract(shortcode_atts(array(
        "name" => "Accordion Section Name"
    ), $atts));
   
    $x = $GLOBALS["section_count"];
    $GLOBALS["sections"][$x] = array(
        "name"   => sprintf( $name, $GLOBALS["section_count"] ),
        "content" => $content
    );
    $GLOBALS["section_count"] += 1;
}
add_shortcode("section", "bear_accordion_section");

/*-----------------------------------------------------------------------------------------------------//	
	Tabs Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_tab_group( $atts, $content ){

	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );
	
	if( is_array( $GLOBALS['tabs'] ) ){
		$int = '1';
		foreach( $GLOBALS['tabs'] as $tab ){
			
			$tabs[] = '<li><a href="#tabs-'.$int.'">'.$tab['title'].'</a></li>';
			
			$panes[] = '
			<div id="tabs-'.$int.'">
				<h3>'.$tab['title'].'</h3>
				'.$tab['content'].'
			</div>';
			
			$int++;
		}
		
		$return = "\n".'
		<div class="bear-tabs">
			<ul>'.implode( "\n", $tabs ).'</ul>
			'."\n".' '.implode( "\n", $panes ).'
		</div>'."\n";		
	}
	
	return $return;
}
add_shortcode( 'tabs', 'bear_tab_group' );	

function bear_tab( $atts, $content ){
	extract(shortcode_atts(array(
		'title' => 'Tab %d'
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' => $content );
	
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'bear_tab' );


/*-----------------------------------------------------------------------------------------------------//	
	Icons Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_icons( $atts, $content = null ) {

    extract(shortcode_atts(array(
	    'style'	=> '',
	    'color'	=> '',
    ), $atts));
	
	$out = '<span class="bear-icon"><i class="icon-'.$style.'" style="color: #'.$color.';"></i> ' .do_shortcode($content). '</span>';

    return $out;
}
add_shortcode('icon', 'bear_icons');

/*-----------------------------------------------------------------------------------------------------//	
	Headline Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_headline( $atts, $content = null ) {

    extract(shortcode_atts(array(
	    'align'	=> '',
	    'color'	=> '',
	    'size'	=> '',
    ), $atts));
	
	$out = '<h2 class="bear-headline '.$size.'-headline" style="text-align: '.$align.'; color: #'.$color.';">' .do_shortcode($content). '</h2>';

    return $out;
}
add_shortcode('headline', 'bear_headline');

/*-----------------------------------------------------------------------------------------------------//	
	Button Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_button( $atts, $content = null ) {

    extract(shortcode_atts(array(
	    'link'	=> '#',
	    'target'	=> '',
	    'color'	=> '',
	    'size'	=> '',
	    'align'	=> '',
    ), $atts));

	$style = ($color) ? ' '.$color.'-btn' : '';
	$align = ($align) ? ' align-'.$align : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<div class="btn-container '.$align.'"><a' .$target. ' class="bear-btn '.$style.' '.$size.'-btn '.$align.'" href="' .$link. '"><span class="btn-holder">' .do_shortcode($content). '</span></a></div>';

    return $out;
}
add_shortcode('button', 'bear_button');

/*-----------------------------------------------------------------------------------------------------//	
	Message Box Shortcode		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_box( $atts, $content = null ) {

    extract(shortcode_atts(array(
	    'color'	=> '',
	    'align'	=> '',
    ), $atts));

	$style = ($color) ? ' '.$color.'-box' : '';
	$align = ($align) ? ' text-'.$align : '';
	
	$out = '<div class="bear-box '.$style.$align.'"><a href="#blank" class="close"><i class="icon-remove"></i></a><div class="box-content">' .do_shortcode($content). '</div></div>';

    return $out;
}
add_shortcode('box', 'bear_box');

/*-----------------------------------------------------------------------------------------------------//	
	Column Shortcodes		       	     	 
-------------------------------------------------------------------------------------------------------*/

function bear_one_third( $atts, $content = null ) {
   return '<div class="bear-column one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'bear_one_third');

function bear_one_third_last( $atts, $content = null ) {
   return '<div class="bear-column one-third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'bear_one_third_last');

function bear_two_third( $atts, $content = null ) {
   return '<div class="bear-column two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'bear_two_third');

function bear_two_third_last( $atts, $content = null ) {
   return '<div class="bear-column two-third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'bear_two_third_last');

function bear_one_half( $atts, $content = null ) {
   return '<div class="bear-column one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'bear_one_half');

function bear_one_half_last( $atts, $content = null ) {
   return '<div class="bear-column one-half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'bear_one_half_last');

function bear_one_fourth( $atts, $content = null ) {
   return '<div class="bear-column one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'bear_one_fourth');

function bear_one_fourth_last( $atts, $content = null ) {
   return '<div class="bear-column one-fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'bear_one_fourth_last');

function bear_three_fourth( $atts, $content = null ) {
   return '<div class="bear-column three-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'bear_three_fourth');

function bear_three_fourth_last( $atts, $content = null ) {
   return '<div class="bear-column three-fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'bear_three_fourth_last');

function bear_one_fifth( $atts, $content = null ) {
   return '<div class="one-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'bear_one_fifth');

function bear_one_fifth_last( $atts, $content = null ) {
   return '<div class="bear-column one-fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'bear_one_fifth_last');

function bear_two_fifth( $atts, $content = null ) {
   return '<div class="bear-column two-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'bear_two_fifth');

function bear_two_fifth_last( $atts, $content = null ) {
   return '<div class="bear-column two-fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'bear_two_fifth_last');

function bear_three_fifth( $atts, $content = null ) {
   return '<div class="bear-column three-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'bear_three_fifth');

function bear_three_fifth_last( $atts, $content = null ) {
   return '<div class="bear-column three-fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'bear_three_fifth_last');

function bear_four_fifth( $atts, $content = null ) {
   return '<div class="bear-column four-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'bear_four_fifth');

function bear_four_fifth_last( $atts, $content = null ) {
   return '<div class="bear-column four-fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'bear_four_fifth_last');

function bear_one_sixth( $atts, $content = null ) {
   return '<div class="bear-column one-sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'bear_one_sixth');

function bear_one_sixth_last( $atts, $content = null ) {
   return '<div class="bear-column one-sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'bear_one_sixth_last');

function bear_five_sixth( $atts, $content = null ) {
   return '<div class="bear-column five-sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'bear_five_sixth');

function bear_five_sixth_last( $atts, $content = null ) {
   return '<div class="bear-column five-sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'bear_five_sixth_last');

/*-----------------------------------------------------------------------------------------------------//	
	Move wpautop filter to AFTER shortcode is processed		       	     	 
-------------------------------------------------------------------------------------------------------*/

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop', 100 );