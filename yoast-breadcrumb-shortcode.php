// Yoast SEO Shortcode
function yoast_breadcrumb_shortcode_shortcode( $atts ) {
	extract( shortcode_atts( array(
		"before" => '<div id="breadcrumb" itemprop="breadcrumb">',
		"after" => '</div>'
	), $atts ) );
	$wpseo_internallinks = get_option( 'wpseo_internallinks' );
	if ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] == 1 ) {
		return yoast_breadcrumb( $before, $after, false );
	}
	elseif ( class_exists( 'WPSEO_Breadcrumbs' ) && $wpseo_internallinks['breadcrumbs-enable'] != 1 ) {
		return __( '<p>Please enable the breadcrumb option to use this shortcode!</p>', 'yoast-breadcrumb-shortcode' );
	}
	else {
		return __( '<p>Please install <a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">WordPress SEO by Yoast</a> plugin and enable the breadcrumb option to use this shortcode!</p>', 'yoast-breadcrumb-shortcode' );
	}
}
add_shortcode( 'yoast-breadcrumb', 'yoast_breadcrumb_shortcode_shortcode' );