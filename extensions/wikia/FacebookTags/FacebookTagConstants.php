<?php

/**
 * Created by IntelliJ IDEA.
 * User: mszabo
 * Date: 2017. 07. 18.
 * Time: 13:02
 */
class FacebookTagConstants {
	const FB_API_URL = 'https://www.facebook.com/plugins/%s.php?%s';
	const SUPPORTED_TAGS = [
		'fb:page',
		'fb:follow',
		'fb:like',
		'fb:like-box',
		'fb:share_button',
	];

	const SUPPORTED_TAG_ATTRIBUTES = [
		'width', 'height', 'style'
	];

	const FB_PLUGIN_OPTS = [
		'page' => [
			'href', 'width', 'height', 'tabs', 'hide_cover', 'show_facepile', 'hide_cta', 'small_header',
			'adapt_container_width'
		],
		'follow' => [
			'colorscheme', 'href', 'kid_directed_site', 'layout', 'show_faces', 'size', 'width'
		],
		'like' => [
			'action', 'colorscheme', 'href', 'kid_directed_site', 'layout', 'ref', 'share', 'show_faces',
			'size', 'width'
		],
		'fb-share-button' => [
			'href', 'layout', 'mobile_iframe', 'size'
		],
	];

	const TAG_FALLBACKS = [
		'share-button' => 'share_button',
		'like-box' => 'page'
	];
}
