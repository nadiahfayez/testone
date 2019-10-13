 
$(function(){

$(".post form").submit(function(){



var title,content,excerpt;

title = $(".post form input[name='title']").val();
content = $(".post form textarea[name='content']").val();
excerpt = $(".post form input[name='excerpt']").val();


if(title.length <100 || title.length >1000){
	$(".post form p.title-error").fadeIn(500);
	return false;
}

else{
	$(".post form p.title-error").fadeOut(500);
}




if(content.length <100 || content.length >1000){
	$(".post form p.content-error").fadeIn(500);
	return false;
}
else{
	$(".post form p.content-error").fadeOut(500);
}




if(excerpt.length ! == 0){


if(excerpt.length <100 || excerpt.length >500) {
	$(".post form p.excerpt-error").fadeIn(500);
	return false;
}
else{
	$(".post form p.excerpt-error").fadeOut(500);
}


}

return true;

});


});
























	