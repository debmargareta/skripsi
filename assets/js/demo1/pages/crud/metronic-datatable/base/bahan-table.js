"use strict";
// Class definition


var KTDatatableHtmlTableRequest = function() {
	// Private functions

	// demo initializer
	var request = function() {
		
		
		var datatable = $('.kt-datatable-bahan').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [{
				field: 'ID',
				title: 'ID',
				autoHide: false,
			},{
				field: 'Nama Bahan',
				title: 'Nama Bahan',
				autoHide: false,
			},{
				field: 'Stok',
				title: 'Stok',
				autoHide: true,
			},{
				field: 'Satuan',
				title: 'Satuan',
				autoHide: true,
			},{
				title: 'Aksi',
				field: 'Aksi',
				autoHide: false,
			},],
		});
	$('#kt_form_request_request').on('change', function() {
		datatable.search($(this).val().toLowerCase(), 'Status');
		});
    $('#kt_form_status_request').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });


    $('#kt_form_status_request, #kt_form_request_request').selectpicker();

	};

	return {
		// Public functions
		init: function() {
			// init dmeo
			request();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableRequest.init();
});
