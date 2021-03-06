var FormValidation = function () {
    $.validator.addMethod("roles", function(value, elem, param) {
        if($(".checkboxValidate:checkbox:checked").length > 0){
            return true;
        }else {
            return false;
        }
    },"You must select at least one!");
    // basic validation
    var handleValidation1 = function() {
        // for more info visit the official plugin documentation:
            // http://docs.jquery.com/Plugins/Validation
            var form1 = $('#search-form');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);
            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules:{
                  isMorning:{roles:0},
                    isAfternoon:{roles:0}
                },
                messages: {
                    isMorning: { roles: "Please select an item!" },
                    isAfternoon: { roles: "Please select an item!" }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    success1.hide();
                    error1.show();
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

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
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