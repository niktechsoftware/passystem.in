var FormValidator = function () {
	"use strict";
    // function to initiate Validation Sample 1
    var runValidator1 = function () {
        var form1 = $('#form');
        var errorHandler1 = $('.errorHandler', form1);
        var successHandler1 = $('.successHandler', form1);
        
        $('#form').validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
                    error.insertAfter($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: "",
            rules: {
                scholerNumber: {
                    minlength: 3,
                    required: true
                },
                firstName: {
                    minlength: 2,
                    required: true
                },
                middleName: {
                    minlength: 2,
                    required: false
                },
                lastName: {
                    minlength: 2,
                    required: true
                },
                dob: {
                    minlength: 2,
                    date: true,
                    required: true
                },
                doa: {
                    minlength: 2,
                    date: true,
                    required: true
                },
                classOfAdmission: {
                    required: true
                },
                section: {
                    required: true
                },
                blood: {
                    minlength: 2
                },
                birthPlace: {
                    minlength: 2
                },
                mothertongue: {
                },
                category: {
                	required: true
                },
                religion: {
                    minlength: 2
                },
                addLine1: {
                    minlength: 2,
                    required: true
                },
                addLine2: {
                    minlength: 2
                },
                city: {
                    minlength: 2,
                    required: true
                },
                state: {
                    minlength: 2,
                    required: true
                },
                pinCode: {
                    minlength: 2,
                    required: true
                },
                country: {
                    minlength: 2,
                    required: true
                },
                phonenumbar: {
                    minlength: 2
                },
                mobileNumber: {
                    minlength: 2,
                    required: true
                },
                email: {
                    minlength: 2,
                    email:true
                },
                fatherName: {
                    minlength: 2,
                    required: true
                },
                motherName: {
                    minlength: 2,
                    required: true
                },
                guardianName: {
                    minlength: 2
                },
                guardianRelation: {
                    minlength: 2
                },
                fatherEducation: {
                    minlength: 2
                },
                motherEducation: {
                    minlength: 2
                },
                fatherOccupation: {
                    minlength: 2
                },
                motherOccupation: {
                    minlength: 2
                },
                familyAnnualIncome: {
                    minlength: 2
                },
                parentAddress: {
                    minlength: 2,
                    required: true
                },
                parentCity: {
                    minlength: 2,
                    required: true
                },
                parentState: {
                    minlength: 2,
                    required: true
                },
                parentPin: {
                    minlength: 2,
                    required: true
                },
                parentCountry: {
                    minlength: 2,
                    required: true
                },
                parentPhoneNumber: {
                    minlength: 10
                },
                fatherMobileNumber: {
                    minlength: 10,
                    required: true
                },
                motherMobileNumber: {
                    minlength: 2
                },
                fatherEmailAddress: {
                    minlength: 2,
                    email:true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                password_again: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                gender: "Please check a gender!"
            },
            groups: {
                DateofBirth: "dd mm yyyy",
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler1.hide();
                errorHandler1.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    };
    
    //--------------------------------------------------------------------------------------------------------------------------------
    return {
        //main function to initiate template pages
        init: function () {
            runValidator1();
        }
    };
}();