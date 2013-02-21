$(function() {

var VideoPage = {
	init: function() {
		var self = this;
		var moreInfoWrapper = $('.more-info-wrapper');
		
		$('#SeeMore').on('click', function(e) {
			e.preventDefault();
			$(this).toggleClass('toggled');
			moreInfoWrapper.toggleClass('show');
			if(moreInfoWrapper.hasClass('show')) {
				moreInfoWrapper.slideDown('fast');
			} else {
				moreInfoWrapper.slideUp('fast');
			}
		});
		
		$('.WikiaMenuElement').on('click', '.remove', function(e) {
			e.preventDefault();
			
			$.showCustomModal($.msg('videohandler-remove-video-modal-title'),'', {
				id: 'remove-video-modal',
				buttons: [
					{
						id: 'ok', 
						defaultButton: true, 
						message: $.msg('videohandler-remove-video-modal-ok'), 
						handler: function(){
							$.nirvana.sendRequest({
								controller: 'VideoHandlerController',
								method: 'removeVideo',
								type: 'POST',
								format: 'json',
								data: {
									title: wgTitle
								},
								callback: function(json) {
									self.modal.closeModal();
								}
							});
						}
					},
					{
						id: 'cancel', 
						message: $.msg('videohandler-remove-video-modal-cancel'), 
						handler: function(){
							self.modal.closeModal();
						}
					}
				],
				callback: function() {
					self.modal = $('#remove-video-modal');
				},
				onAfterClose: function() {
					GlobalNotification.show($.msg('videohandler-remove-video-modal-success', wgTitle), 'confirm');	
				}
			});
		});
	}
}

VideoPage.init();

});