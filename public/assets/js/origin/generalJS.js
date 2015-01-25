var GeneralJS = (function (){

	var  centerModal = function (modal) {
	    $(modal).css('display', 'block');
	    var $dialog = $(modal).find(".modal-dialog");
	    var offset = ($(window).height() - $dialog.height()) / 2;
	    // Center modal vertically in window
	    $dialog.css("margin-top", offset);
	}

	return {

		initGeneralSetUp: function(){

			$('#confirm-delete').on('show.bs.modal', function(e) {
				centerModal(this);
			    $(this).find('.modal_delete_form').attr('action', BASE_URL+"/"+$(e.relatedTarget).attr('data-toDelete'));
			    $(this).find('.headDeleteinfo').html($(e.relatedTarget).attr('data-deleteContentInfo'));
			});

		}
	}

})();