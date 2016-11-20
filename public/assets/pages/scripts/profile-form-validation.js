var FormValidation = function () {

    // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation:
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#profile-form');

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                messages: {
                },
                rules: {
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var cont = $(element).parent('.input-group');
                    if (cont) {
                        cont.after(error);
                    } else {
                        element.after(error);
                    }
                },

                highlight: function (element) { // hightlight error inputs

                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (e) {
                    e.submit();
                }
            });
    };
    return {
        //main function to initiate the module
        init: function () {
            handleValidation1();
        }
    };
}();

jQuery(document).ready(function() {
    FormValidation.init();
});