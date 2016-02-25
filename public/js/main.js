function func_click_add_news_dialog(){
	$('.add-news').click(function(){
		$.post("/add?", {'get-form':'true'})
		.done(function(data) {
			$(".message-box").html(data);
			$(".message-box").dialog({minWidth: 200,maxWidth: 500})
		})
	});
}
function func_get_theme_list_html(){
	$.post("gtl", {'get-list':true})
	.done(function(data){
		//alert(data);
		//$('#theme-list').html(data);
	});
}
function func_get_news_list_html(){
}
function func_get_datesMenu_list_html(){
}
