
$('.focus').mousemove(function(e){
    var X = e.pageX;
    var Y = e.pageY;
	var top = Y  + 10 + 'px';
	var left = X  + 10 + 'px';
	var id = $(this).data('tooltip');
	$('#tip-'+id).css({
        display:"block",
        top: top,
        left: left
    });
});
$('.focus').mouseout (function(){
	var id = $(this).data('tooltip');
	$('#tip-'+id).css({
		display:"none"
	});
});