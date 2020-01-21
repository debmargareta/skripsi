<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
	<base href="../../../">
	<meta charset="utf-8" />
	<title>Grandy | Tambah Bahan</title>
	<meta name="description" content="Multi column form examples">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->

	<!--begin::Global Theme Styles(used by all pages) -->

	<!--begin:: Vendor Plugins -->
	<link href="<?php echo base_url();?>assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

	<!--end:: Vendor Plugins -->
	<link href="<?php echo base_url();?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--begin:: Vendor Plugins for custom pages -->
	<link href="<?php echo base_url();?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" />

	<!--end:: Vendor Plugins for custom pages -->

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="<?php echo base_url();?>assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css" />

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="index.html">
				<img alt="Logo" src="assets/media/logos/logo-light.png" />
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
		</div>
	</div>

	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<!-- begin:: Aside -->

				<!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
<?php include("leftsidebar.php")?>

<!-- end:: Aside -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

	<!-- begin:: Header -->
	<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

		<!-- begin:: Header Menu -->

						<!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
<?php include("topnavbar.php")?>

<!-- end:: Header Menu -->

<!-- begin:: Header Topbar -->
<!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<!-- begin:: Subheader -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<span class="kt-subheader__separator kt-hidden"></span>
				<div class="kt-subheader__breadcrumbs">
					<a class="kt-subheader__breadcrumbs"><i class="flaticon2-shelter">&nbsp;</i></a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a class="kt-subheader__breadcrumbs">
					Bahan, Resep, dan Kue &nbsp;</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a class="kt-subheader__breadcrumbs">
					&nbsp;Data Bahan &nbsp;</a>
					<span class="kt-subheader__breadcrumbs-separator"></span>
					<a href="<?php echo base_url("c_bahan/tampil_tambah_bahan");?>" class="kt-subheader__breadcrumbs-link">
					&nbsp;Tambah Data </a>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Subheader -->

	<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="row">
			<div class="col-lg-12">

				<!--begin::Portlet-->
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Tambah Data bahan
							</h3>
						</div>
					</div>

					<!--begin::Form-->
					<form class="kt-form kt-form--label-right" method="post" action="<?php echo base_url("c_bahan/save/")?>">
						<div class="kt-portlet__body">
							<div class="form-group row">
								<div class="col-lg-4">
									<input type="hidden" name="counter[]" value="0">
									<label>Nama Overhead:</label>
									<input type="text" class="form-control" name="namaBahan0">
									<span class="form-text text-muted">Masukkan nama bahan</span>
								</div>
								<div class="col-lg-4">
									<label>Satuan:</label>
									<div class="kt-input-icon">
										<select name="satuanBahan0" class="form-control">
										<?php foreach($satuan as $pilih){?>
											<option value="<?php echo $pilih->id_satuan?>"><?php echo $pilih->nama_satuan?></option>
										<?php }?>
										</select>
									</div>
									<span class="form-text text-muted">Pilih satuan bahan</span>
								</div>
								<div class="col-lg-4">
									<label>Golongan Bahan:</label>
									<div class="kt-input-icon">
										<select name="golBahan0" class="form-control">
											<option value="Biaya Bahan Baku">Biaya Bahan Baku Langsung</option>
											<option value="Biaya Overhead">Biaya Bahan Baku Penolong</option>
										</select>
									</div>
									<span class="form-text text-muted">Pilih golongan bahan</span>
								</div>
							</div>
						</div>
						<div class="kt-portlet__foot">
							<div class="kt-form__actions">
								<div class="row">
									<div class="col-lg-4"> <button type="button" onclick = "loadnew()" id="btn-tambah-form" class="btn btn-success">Tambah Data</button>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<button type="sumbit" class="btn btn-primary">Simpan</button>&emsp;&emsp;&emsp;&emsp;&emsp;
										</div>
										<div class="col-lg-4">
											<a href="<?php echo base_url("c_bahan/tampil_bahan")?>">
												<button type="submit" class="btn btn-secondary">Batal</button></a>
										</div>
										</div>
									</div>
								</div>
							</div>
					</form>
					<!--end::Form-->
				</div>

				<!--end::Portlet-->
			</div>
		</div>
	</div>

	<!-- end:: Content -->
</div>

<!-- begin:: Footer -->
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-footer__copyright">
			2019&nbsp;&copy;&nbsp;Grandy</a>
		</div>
	</div>
</div>

<!-- end:: Footer -->
</div>
</div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
	var KTAppOptions = {
		"colors": {
			"state": {
				"brand": "#5d78ff",
				"dark": "#282a3c",
				"light": "#ffffff",
				"primary": "#5867dd",
				"success": "#34bfa3",
				"info": "#36a3f7",
				"warning": "#ffb822",
				"danger": "#fd3995"
			},
			"base": {
				"label": [
				"#c5cbe3",
				"#a1a8c3",
				"#3d4465",
				"#3e4466"
				],
				"shape": [
				"#f0f3ff",
				"#d9dffa",
				"#afb4d4",
				"#646c9a"
				]
			}
		}
	};
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->
<script src="<?php echo base_url();?>assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="<?php echo base_url();?>assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="<?php echo base_url();?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/daygrid/main.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/google-calendar/main.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/interaction/main.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/@fullcalendar/timegrid/main.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/dist/es5/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/source/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/source/jquery.flot.categories.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/source/jquery.flot.pie.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/source/jquery.flot.stack.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/source/jquery.flot.crosshair.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/flot/source/jquery.flot.axislabels.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/js/global/integration/plugins/datatables.init.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-buttons/js/buttons.print.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/tinymce/themes/silver/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/plugins/custom/tinymce/themes/mobile/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
<!--end:: Vendor Plugins for custom pages -->

<!--end::Global Theme Bundle -->
</body>

<!-- end::Body -->
</html>
<script>
	var counter = 1;
	function loadnew(){
		var newrow = $(".kt-portlet__body");
		var cols ="";

		cols += '<div class="form-group row">';
		cols += '<div class="col-lg-4">';
		cols += '<input type="hidden" name="counter[]" value="'+counter+'">';
		cols += '<label>Nama Bahan:</label>';
		cols += '<input type="text" class="form-control" name="namaBahan'+counter+'">';
		cols += '<span class="form-text text-muted">Masukkan nama bahan</span>';
		cols += '</div>';
		cols += '<div class="col-lg-4">';
		cols += '<label>Satuan Bahan:</label>'
		cols += '<div class="kt-input-icon">';
		cols += '<select name="satuanBahan'+counter+'" class="form-control">';
		cols += '<?php foreach($satuan as $pilih){?>';
		cols += '<option value="<?php echo $pilih->id_satuan?>"><?php echo $pilih->nama_satuan?></option>';
		cols += '<?php }?>';
		cols += '</select>';
		cols += '</div>';
		cols += '<span class="form-text text-muted">Pilih satuan bahan</span>';
		cols += '</div>';
		cols += '<div class="col-lg-4">';
		cols += '<label>Golongan Bahan:</label>';
		cols += '<div class="kt-input-icon">';
		cols += '<select name="golBahan'+counter+'" class="form-control">';
		cols += '<option value="Biaya Bahan Baku">Biaya Bahan Baku Langsung</option>';
		cols += '<option value="Biaya Overhead">Biaya Overhead Penolong</option>';
		cols += '</select>';
		cols += '</div>';
		cols += '<span class="form-text text-muted">Pilih golongan bahan</span>';
		cols += '</div>';
		cols += '</div>';
		newrow.append(cols);
		$("form-group row").append(newrow);
		counter++;
		document.getElementById("counter").value=counter;
	}
</script>