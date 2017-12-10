Numbers = /(?=(.*[1-9]){1}).{1,}/;
// Validation for Number of people
$("#firstName").focus(function(){
	if ($(this).val().length === 0) {
		$(this).parent().find("span.input-errors").empty();
		$(this).parent().find("span.input-errors").append("<ul class='error'></ul>");
		$(this).parent().find("span.input-errors ul").append(
								"<li class='numbers'>Must be at least 1 person</li>"+
								"<li class='numbers'>Must be a number</li>"
							);

	}
}).keyup(function(){
	if ($(this).val().match(Numbers)) {
		$(this).parent().find("span.input-errors .numbers").remove();

	}else if ( (!$(this).val().match(Numbers)) && ($("li.numbers").length === 0) ){
		$(this).parent().find("span.input-errors ul").append("<li class='numbers'>Must be at least 1 person</li>" + "<li class='numbers'>Must be a number</li>");
	
	}
});

// // Validation for Days of Hire
// $("#Hire").focus(function(){
// 	if ($(this).val().length === 0) {
// 		$(this).parent().find("span.input-errors").empty();
// 		$(this).parent().find("span.input-errors").append("<ul class='error'></ul>");
// 		$(this).parent().find("span.input-errors ul").append(
// 								"<li class='numbers'>Must include 1 number</li>"
// 							);

// 	}
// }).keyup(function(){
// 	if ($(this).val().match(Numbers)) {
// 		$(this).parent().find("span.input-errors .numbers").remove();

// 	}else if ( (!$(this).val().match(Numbers)) && ($("li.numbers").length === 0) ){
// 		$(this).parent().find("span.input-errors ul").append("<li class='numbers'>Must hire for at least 1 day</li>");
// 	}
// 	maxNumber = $(this).parent().find("span.input-errors");
// 	if ($(this).val() <= 15){
// 		$(this).parent().find("span.input-errors .max").remove();
// 	} else if ( (!$(this).val().match(maxNumber)) && ($("li.max").length === 0) ){
// 		$(this).parent().find("span.input-errors ul").append("<li class='max'>Must be less than 15 days</li>");
// 	}

// });