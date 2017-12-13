jQuery(document).ready(function($){

	$('.back').click(function(){
		goBack();
	})

	function goBack(){
		window.history.back();
	}

});