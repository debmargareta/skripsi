"use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
	// Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('.kt-datatable').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [
				{
					field: 'ID Karyawan',
					title: 'ID Karyawan',
					autoHide: false,
				},
				{
					field: 'Nama Karyawan',
					title: 'Nama Karyawan',
					autoHide: false,
				},
				{
					field: 'Nama Karyawan',
					title: 'Nama Karyawan',
					autoHide: false,
				},
				{
					field: 'Alamat',
					title: 'Alamat',
					autoHide: true,
				},
				{
					field: 'No Telepon',
					title: 'No Telepon',
					autoHide: false,
				},
				{
					field: 'Gaji Harian',
					title: 'Gaji Harian',
					autoHide: true,
				},
				{
					field: 'Tanggal Kerja',
					type: 'date',
					format: 'YYYY-MM-DD',
					autoHide:true,
				}, {
					field: 'Peran',
					title: 'Peran',
					autoHide: true,
				}, {
					field: 'Aksi',
					title: 'Aksi',
					autoHide: false,
				},
			],
		});

    $('#kt_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#kt_form_status,#kt_form_type').selectpicker();

	};

	return {
		// Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableDemo.init();
});