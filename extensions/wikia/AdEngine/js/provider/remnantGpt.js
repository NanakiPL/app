/*global define*/
define('ext.wikia.adEngine.provider.remnantGpt', [
	'ext.wikia.adEngine.adContext',
	'ext.wikia.adEngine.context.uapContext',
	'ext.wikia.adEngine.provider.factory.wikiaGpt',
	'ext.wikia.adEngine.slot.adUnitBuilder',
	'ext.wikia.adEngine.slotTweaker'
], function (adContext, uapContext, factory, adUnitBuilder, slotTweaker) {
	'use strict';

	var src = 'remnant';

	return factory.createProvider(
		'ext.wikia.adEngine.provider.remnantGpt',
		'RemnantGpt',
		src,
		{
			BOTTOM_LEADERBOARD: {size: '728x90', loc: 'footer'},
			EXIT_STITIAL_BOXAD_1: {size: '300x250,600x400,800x450,550x480', loc: 'exit'},
			INCONTENT_BOXAD_1: {size: '120x600,160x600,300x250,300x600', loc: 'hivi'},
			INCONTENT_LEADERBOARD: {size: '1x1,728x90,300x250,468x60', loc: 'hivi'},
			INVISIBLE_HIGH_IMPACT_2: {loc: 'hivi'},
			INVISIBLE_SKIN: {size: '1000x1000,1x1', loc: 'top'},
			LEFT_SKYSCRAPER_2: {size: '120x600,160x600,300x250,300x600,300x1050', loc: 'middle'},
			LEFT_SKYSCRAPER_3: {size: '120x600,160x600,300x250,300x600', loc: 'footer'},
			PREFOOTER_LEFT_BOXAD: {size: '300x250', loc: 'footer'},
			PREFOOTER_MIDDLE_BOXAD: {size: '300x250', loc: 'footer'},
			PREFOOTER_RIGHT_BOXAD: {size: '300x250', loc: 'footer'},
			TOP_LEADERBOARD: {
				size: '728x90,1030x130,1030x65,1030x250,970x365,970x250,970x90,970x66,970x180,980x150',
				loc: 'top'
			},
			TOP_RIGHT_BOXAD: {size: '300x250,300x600,300x1050', loc: 'top'}
		},
		{
			beforeSuccess: function (slotName) {
				slotTweaker.removeDefaultHeight(slotName);
				if (!uapContext.isUapLoaded()) {
					slotTweaker.removeTopButtonIfNeeded(slotName);
					slotTweaker.adjustLeaderboardSize(slotName);
				}
			},
			buildAdUnit: function (slotName, passback) {
				return adContext.getContext().opts.enableRemnantNewAdUnit ?
					adUnitBuilder.buildNew(src, slotName, passback) : adUnitBuilder.build(slotName, src);
			}
		}
	);
});
