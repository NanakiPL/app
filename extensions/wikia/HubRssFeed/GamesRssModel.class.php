<?php

/**
 * Created by PhpStorm.
 * User: krzychu
 * Date: 23.05.14
 * Time: 09:33
 */
class GamesRssModel extends BaseRssModel {
	const FEED_NAME = 'games';
	const MAX_NUM_ITEMS_IN_FEED = 15;
	const GAMING_HUB_CITY_ID = 955764;
	const FRESH_CONTENT_TTL_HOURS = 24;

	public function getFeedTitle() {
		return 'Wikia Games Feed';
	}

	public function getFeedLanguage() {
		return 'en';
	}

	public function getFeedDescription() {
		return 'Wikia Games Feed';
	}

	public function getFeedData() {

		if ( $this->forceRegenerateFeed == false && $this->isFreshContentInDb( self::FEED_NAME, self::FRESH_CONTENT_TTL_HOURS ) ) {
			return $this->getLastRecoredsFromDb( self::FEED_NAME, self::MAX_NUM_ITEMS_IN_FEED );
		}

		$timestamp = $this->getLastFeedTimestamp( self::FEED_NAME ) + 1;
		$duplicates = $this->getLastDuplicatesFromDb( self::FEED_NAME );

		$blogData = $this->getDataFromBlogs( $timestamp );
		$blogData = $this->removeDuplicates( $blogData, $duplicates );
		if ( !empty( $blogData ) || $this->forceRegenerateFeed ) {
			$hubData = $this->getDataFromHubs( self::GAMING_HUB_CITY_ID, $timestamp, $duplicates );
		}
		$rawData = array_merge(
			$blogData,
			$hubData
		);
		$out = $this->processItems( $rawData );
		$this->addFeedsToDb( $out, self::FEED_NAME );
		if ( count( $out ) != self::MAX_NUM_ITEMS_IN_FEED ) {
			$out = $this->getLastRecoredsFromDb( self::FEED_NAME, self::MAX_NUM_ITEMS_IN_FEED, true );
		}
		return $out;
	}

	protected function getDataFromBlogs( $fromTimestamp ) {
		$feedModel = new \Wikia\Search\Services\FeedEntitySearchService();
		$fromDate = date( 'Y-m-d\TH:i:s\Z', $fromTimestamp );
		$feedModel->setRowLimit( self::MAX_NUM_ITEMS_IN_FEED );
		$feedModel->setSorts( [ 'created' => 'desc' ] );
		$rows = $feedModel->query( '((+host:"dragonage.wikia.com" AND +categories_mv_en:"News")
		| (+host:"warframe.wikia.com" AND +categories_mv_en:"Blog posts")
		| (+host:"monsterhunter.wikia.com" AND +categories_mv_en:"News")
		| (+host:"darksouls.wikia.com" AND +categories_mv_en:"News")
		| (+host:"halo.wikia.com" AND +categories_mv_en:"Blog_posts/News")
		| (+host:"gta.wikia.com" AND +categories_mv_en:"News")
		| (+host:"fallout.wikia.com" AND +categories_mv_en:"News")
		| (+host:"elderscrolls.wikia.com" AND +categories_mv_en:"News")
		| (+host:"leagueoflegends.wikia.com" AND +categories_mv_en:"News_blog")) AND created:[ ' . $fromDate . ' TO * ]' );
		return $rows;
	}


}