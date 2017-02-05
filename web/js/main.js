var jsonresult;
$(function(){
	$('.modalButton').click(function(){
		var id = $(this).attr('id');
		id = id.substring(4);
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
		$('#modal').on('hidden.bs.modal', function () {
  			var objid = 'pessoa-' + id;
			obj = JSON.parse(jsonresult);
			$(objid).select2(obj);
		});
			
	});
});