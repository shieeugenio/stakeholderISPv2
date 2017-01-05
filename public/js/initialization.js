
function init() {
	$('.tabular.menu .item').tab();

	$('.ui.dropdown').dropdown();

	$('.ui.checkbox').checkbox();



	$(document).ready(function() {
		$('#datatable').DataTable();
	} );

	$('#select').dropdown();

	$('.ui.sticky')
	  .sticky({
	    context: '#summary'
	  });

	$('.ui.modal')
	  .modal();
	
}//function init() {
