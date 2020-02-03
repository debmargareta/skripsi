// Class definition

var KTFormControls = function () {
    // Private functions

    var demo1 = function () {
        $( "#kt_form_1" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true,
                    minlength: 10
                },
                url: {
                    required: true
                },
                digits: {
                    required: true,
                    digits: true
                },
                creditcard: {
                    required: true,
                    creditcard: true
                },
                phone: {
                    required: true,
                    phoneUS: true
                },
                option: {
                    required: true
                },
                options: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                memo: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },

                checkbox: {
                    required: true
                },
                checkboxes: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                radio: {
                    required: true
                }
            },

            errorPlacement: function(error, element) {
                var group = element.closest('.input-group');
                if (group.length) {
                    group.after(error.addClass('invalid-feedback'));
                } else {
                    element.after(error.addClass('invalid-feedback'));
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                var alert = $('#kt_form_1_msg');
                alert.removeClass('kt--hide').show();
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
            }
        });
    }

    var demo2 = function () {
        $( "#kt_form_2" ).validate({
            // define validation rules
            rules: {
                //= Client Information(step 3)
                // Billing Information
                namaKaryawan: {
                    required: true
                },
                alamatKaryawan: {
                    required: true,
                },
                noKaryawan: {
                    required: true,
                    number: true,
                    minlength: 12,
                    maxlength: 13
                },
                gajiKaryawan: {
                    required: true,
                    number: true,
                    minlength: 0
                },
                peranKaryawan: {
                    required: true
                }
            },

            //display error alert on form submit
            invalidHandler: function(event, validator) {
                swal.fire({
                    "title": "",
                    "text": "There are some errors in your submission. Please correct them.",
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary",
                    "onClose": function(e) {
                        console.log('on close event fired!');
                    }
                });

                event.preventDefault();
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
                swal.fire({
                    "title": "",
                    "text": "Data sukses dimasukkan",
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
                });
                form[0].submit();

                return false;
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});