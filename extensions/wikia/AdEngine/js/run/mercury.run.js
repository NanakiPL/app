/*global require*/
require([
	'ext.wikia.adEngine.adContext',
	'ext.wikia.adEngine.lookup.amazonMatch',
	'ext.wikia.adEngine.lookup.openXBidder',
	'ext.wikia.adEngine.lookup.prebid',
	'ext.wikia.adEngine.lookup.rubicon.rubiconFastlane',
	'ext.wikia.adEngine.lookup.rubicon.rubiconVulcan',
	'ext.wikia.adEngine.templatesService',
	'ext.wikia.adEngine.messageListener',
	'ext.wikia.adEngine.mobile.mercuryListener',
	'ext.wikia.adEngine.slot.scrollHandler',
	'ext.wikia.adEngine.provider.yavliTag',
	'wikia.geo',
	'wikia.instantGlobals',
	'wikia.window'
], function (
	adContext,
	amazon,
	oxBidder,
	prebid,
	rubiconFastlane,
	rubiconVulcan,
	templatesService,
	messageListener,
	mercuryListener,
	scrollHandler,
	yavliTag,
	geo,
	instantGlobals,
	win
) {
	'use strict';

	messageListener.init();
	scrollHandler.init('mercury');

	// Custom ads (skins, footer, etc)
	win.loadCustomAd = templatesService.loadCustomAd;

	if (geo.isProperGeo(instantGlobals.wgAmazonMatchCountriesMobile)) {
		amazon.call();
	}

	mercuryListener.onLoad(function () {
		if (geo.isProperGeo(instantGlobals.wgAdDriverRubiconFastlaneCountries)) {
			rubiconFastlane.call();
		}

		if (geo.isProperGeo(instantGlobals.wgAdDriverOpenXBidderCountries)) {
			oxBidder.call();
		}

		if (geo.isProperGeo(instantGlobals.wgAdDriverPrebidBidderCountries)) {
			prebid.call();
		}

		if (geo.isProperGeo(instantGlobals.wgAdDriverRubiconVulcanCountries)) {
			rubiconVulcan.call();
		}

		if (adContext.getContext().opts.yavli) {
			yavliTag.add();
		}
	});
});
