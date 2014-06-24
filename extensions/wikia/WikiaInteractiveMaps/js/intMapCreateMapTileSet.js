define(
	'wikia.intMap.createMap.tileSet',
	[
		'jquery',
		'wikia.window',
		'wikia.intMap.utils'
	],
	function($, w, utils) {
		'use strict';

		// reference to modal component
		var modal,
			// mustache template
			uiTemplate,
			tileSetThumbTemplate,
			// template data
			templateData = {
				mapType: [
					{
						type: 'Geo',
						name: $.msg('wikia-interactive-maps-create-map-choose-type-geo')
					},
					{
						type: 'Custom',
						name: $.msg('wikia-interactive-maps-create-map-choose-type-custom')
					}
				],
				chooseTileSetTip: $.msg('wikia-interactive-maps-create-map-choose-tile-set-tip'),
				browse: $.msg('wikia-interactive-maps-create-map-browse-tile-set'),
				uploadLink: $.msg('wikia-interactive-maps-create-map-upload-file'),
				searchPlaceholder: $.msg('wikia-interactive-maps-create-map-search-tile-set-placeholder')
			},
			//modal events
			events = {
				intMapGeo: [
					function() {
						modal.trigger('previewTileSet', {
							type: 'geo'
						});
					}
				],
				intMapCustom: [
					function() {
						showStep('chooseTileSet');
					}
				],
				previousStep: [
					previousStep
				],
				chooseTileSet: [
					chooseTileSet
				],
				selectTileSet: [
					function(event) {
						modal.trigger('previewTileSet', {
							type: 'custom',
							tileSetId: $(event.currentTarget).data('id')
						});
					}
				],
				uploadTileSetImage: [
					function() {
						console.log($uploadInput);
						$uploadInput
							.click()
					}
				]
			},
			// steps for choose tile set
			steps = {
				selectType: {
					id: '#intMapChooseType',
					buttons: {}
				},
				chooseTileSet: {
					id: '#intMapBrowse',
					buttons: {
						'#intMapBack': 'previousStep'
					},
					helper: chooseCustomTileSet
				}
			},
			noTileSetMsg = $('wikia-interactive-maps-create-map-no-tile-set-found'),
			// image upload entry point
			uploadEntryPoint = '/wikia.php?controller=WikiaInteractiveMaps&method=uploadMap&format=json',
			// stack for holding choose tile set steps
			stepsStack = [],
			// cached selectors
			$sections,
			$tileSetsContainer,
			$uploadInput;

		/**
		 * @desc initializes and configures UI
		 * @param {object} _modal - modal component
		 * @param {string} _uiTemplate - mustache template for this step UI
		 * @param {string} _tileSetThumbTemplate - mustache template for tile set thumb
		 */
		function init(_modal, _uiTemplate, _tileSetThumbTemplate) {
			modal = _modal;
			uiTemplate = _uiTemplate;
			tileSetThumbTemplate = _tileSetThumbTemplate;

			utils.bindEvents(modal, events);

			// set base step
			addToStack('selectType');

			// TODO: figure out where is better place to place it and move it there
			modal.$element
				.on('change', '#intMapUpload', function(event) {
				uploadMapImage(event.target.parentNode);
				})
				.on('keypress', '#intMapTileSetSearch', function(event) {
					searchTileSet(event.target.value);
				});

		}

		/**
		 * @desc entry point for choose tile set steps
		 */
		function chooseTileSet() {
			modal.$innerContent.html(utils.render(uiTemplate, templateData));

			// cache selectors
			$sections = modal.$innerContent.children();
			$tileSetsContainer = modal.$innerContent.find('#intMapBrowse ul');
			$uploadInput =  modal.$innerContent.find('#intMapUpload');

			showStep(stepsStack.pop());
		}

		/**
		 * @desc adds step to steps stack
		 * @param {string} step - key of the step
		 */
		function addToStack(step) {
			stepsStack.push(step);
		}

		/**
		 * @desc shows step content
		 * @param {string} id - step is
		 */
		function showStepContent(id) {
			$sections.addClass('hidden');
			$sections.filter(id).removeClass('hidden');
		}

		/**
		 * @desc shows the given step in choose tile set flow
		 * @param {string} stepName - name of the step
		 */
		function showStep(stepName) {
			var step = steps[stepName];

			addToStack(stepName);
			showStepContent(step.id);
			utils.setButtons(modal, step.buttons);

			if (typeof step.helper === 'function') {
				step.helper();
			}

			modal.trigger('cleanUpError');

		}

		/**
		 * @desc switches to the previous step in create map flow
		 */
		function previousStep() {
			// removes current step from stack
			stepsStack.pop();

			showStep(stepsStack.pop());
		}

		/**
		 * @desc handler function for search tile set input field
		 * @param {string} keyword - search term
		 */
		function searchTileSet(keyword) {
			var trimmedKeyword = keyword.trim();

			if (trimmedKeyword.length >= 2) {
				chooseCustomTileSet(trimmedKeyword);
			}
		}

		/**
		 * @desc sets up choose tile set step
		 * @param {string=} keyword - search term
		 */
		function chooseCustomTileSet(keyword) {
			getTileSetThumbs(keyword).done(function(tileSetData) {
				updateTileSetList(renderTileSetThumbs(tileSetThumbTemplate, tileSetData));
			});
		}

		/**
		 * @desc loads tile sets thumbs
		 * @param {string=} searchTerm - search term, if specified loads tile set which name match this term
		 */
		function getTileSetThumbs(searchTerm) {
			var dfd = new $.Deferred();

			$.nirvana.sendRequest({
				controller: 'WikiaInteractiveMaps',
				method: 'getTileSets',
				format: 'json',
				data: searchTerm ? {searchTerm: searchTerm} : null,
				callback: function(response) {
					var data = response.results;

					if (data && data.success) {
						dfd.resolve(data.content);
					} else {
						dfd.reject();
						modal.trigger('error', data.content.message);
					}
				},
				onErrorCallback: function(response) {
					dfd.reject();
					modal.trigger('error', response.results.content.message);
				}
			});

			return dfd.promise();
		}

		/**
		 * @desc renders tile set thumbs markup
		 * @param {string} template - mustache template
		 * @param {array} tileSets - array of tile set objects
		 * @returns {string} - HTML markup
		 */
		function renderTileSetThumbs(template, tileSets) {
			var html = '';

			tileSets.forEach(function(tileSet) {
				html += utils.render(template, tileSet);
			});

			return html;
		}

		/**
		 * @desc removes old tile sets from list and adds new one
		 * @param {string} markup - HTML markup
		 */
		function updateTileSetList(markup) {
			$tileSetsContainer.children('.tile-set-thumb').remove();
			modal.trigger('cleanUpError');

			if (markup) {
				$tileSetsContainer.append(markup);
			} else {
				modal.trigger('error', noTileSetMsg);
			}
		}

		/**
		 * @desc uploads image to backend
		 * @param {object} form - html form node element
		 */
		function uploadMapImage(form) {
			$.ajax({
				contentType: false,
				data: new FormData(form),
				processData: false,
				type: 'POST',
				url: w.wgScriptPath + uploadEntryPoint,
				success: function(response) {
					var data = response.results;

					if (data && data.success) {
						modal.trigger('cleanUpError');
						data.type = 'custom';
						modal.trigger('previewTileSet', data);
					} else {
						modal.trigger('error', data.errors.pop());
					}
				},
				error: function(response) {
					modal.trigger('error', response.results.error);
				}
			});
		}

		return {
			init: init
		};
	}
);
