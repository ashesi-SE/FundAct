$(function(){

var rel = $('body[rel]').attr('rel');
$('#menu a:eq('+ rel +') , #m_menu a:eq('+ rel +')').addClass('active');

$('#m_bottom').on('click', function(){
	$('#m_menu').sidebar('toggle');

});	

});