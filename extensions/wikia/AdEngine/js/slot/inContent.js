/*global define*/
define('ext.wikia.adEngine.slot.inContent', [
	'ext.wikia.adEngine.adTracker',
	'ext.wikia.adEngine.context.slotsContext',
	'JSMessages',
	'wikia.document',
	'wikia.log',
	'wikia.window'
], function (adTracker, slotsContext, msg, doc, log, win) {
	'use strict';

	var logGroup = 'ext.wikia.adEngine.slot.inContent',
		selector = '#mw-content-text > h2';

	/**
	 * Adds dynamically new slot in the right place and sends tracking data
	 */
	function init(slotName, onSuccessCallback) {
		var adHtml = doc.createElement('div'),
			header = doc.querySelectorAll(selector)[1],
			logMessage,
			logWikiData = '(wikiId: ' + win.wgCityId + ' articleId: ' + win.wgArticleId + ')',
			slotNameGA = slotName.toLowerCase();

		if (!header) {
			logMessage = 'no second section in the article ' + logWikiData;
			log(slotName + ' not added - ' + logMessage, 'debug', logGroup);
			adTracker.track('slot/' + slotNameGA + '/failed', {'reason': logMessage});
			return;
		}

		if (!slotsContext.isApplicable(slotName)) {
			logMessage = '2nd section in the article is not full width ' + logWikiData;
			log(slotName + ' not added - ' + logMessage, 'debug', logGroup);
			adTracker.track('slot/' + slotNameGA + '/failed', {'reason': logMessage});
			return;
		}

		adHtml.id = 'INCONTENT_WRAPPER';
		adHtml.innerHTML = '<div id="' + slotName + '" class="wikia-ad default-height" data-label="' + msg('adengine-advertisement') + '"></div>';

		log('insertSlot', 'debug', logGroup);
		header.parentNode.insertBefore(adHtml, header);
		win.adslots2.push({
			slotName: slotName,
			onSuccess: onSuccessCallback
		});
		adTracker.track('slot/' + slotNameGA + '/success');
	}

	return {
		init: init
	};
});
