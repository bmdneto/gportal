 $(document).ready(function() {
 
	$('.tabs a').click(function(){
		switch_tabs($(this));
	});
 
	switch_tabs($('.defaulttab'));
 
});
 
function switch_tabs(obj)
{
	$('.tab-content').hide();
	$('.tabs a').removeClass("selected");
	$('.tabs span').removeClass("bg");
	var id = obj.attr("rel");
	var idspan = id+'span';
	$('#'+id).show();
	obj.addClass("selected");
	$('#'+idspan).addClass("bg");
}
