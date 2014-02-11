$(document).ready(function(){

	// Changes the action of the upload file's form according to the content type
	$('.add').on('click', function(){
		var content = $(this).attr('data-contentType');
		var newUrl = $('form[name=addFileForm]').attr('action')+'/'+content;
		$('form[name=addFileForm]').get(0).setAttribute('action', newUrl);
	});

	$('.delete').confirmOn('click', function(e, confirmed){
	    if(!confirmed) e.preventDefault();
	    else window.location.href = e.target;
	});

});