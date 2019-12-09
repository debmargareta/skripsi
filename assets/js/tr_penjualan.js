"use strict";
// Class definition


var KTDatatableHtmlTableRequest = function() {
	// Private functions

	// demo initializer
	var request = function() {
		
		
		var datatable = $('.kt-datatable-penjualan').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [{
				field: 'Kode Penjualan',
				title: 'Kode Penjualan',
				autoHide: false,
			},{
				field: 'ID Pesanan',
				title: 'ID Pesanan',
				autoHide: false,
			},{
				field: 'Tanggal Transaksi',
				title: 'Tanggal Transaksi',
				autoHide: false,
			},{
				field: 'Total Harga',
				title: 'Total Harga',
				autoHide: false,
			},{
				field: 'Status Pembayaran',
				title: 'Status Pembayaran',
				autoHide: false,
			},{
				title: 'Aksi',
				field: 'Aksi',
				// callback function support for column rendering
				template: function(row) {
					var status = {
						0: {'title': 'Pending', 'state': 'warning'},
						1: {'title': 'Responded', 'state': 'primary'},
						2: {'title': 'OK', 'state': 'success'},
						3: {'title': 'Canceled', 'state': 'danger'},
					};
					return '<span class=" kt-badge--' + status[row.Request].state + '"></span>&nbsp;<span class="kt-font-bold kt-font-' + status[row.Request].state + '">' + status[row.Request].title + '</span>';
				},
			},  {
				field: 'Status',
				title: 'Status',
				autoHide: false,
				// callback function support for column rendering
				template: function(row) {
					var status = {
						0: {'title': 'Active', 'class': 'kt-badge--success'},
						1: {'title': 'Not Active', 'class': 'kt-badge--danger'},
						
					};
					return '<span class="kt-badge ' + status[row.Status].class + ' kt-badge--inline kt-badge--pill">' + status[row.Status].title + '</span>';
				},
			}, {
				field: 'Actions',
				title: 'Actions',
				sortable: false,
				width: 110,
				overflow: 'visible',
				textAlign: 'left',
				autoHide: false,

			}],
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
