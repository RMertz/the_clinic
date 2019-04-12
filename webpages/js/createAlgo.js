var account = {



    /**
     * Initialize
     */
    init: function () {
        this.cacheDom();
        //this.getParams();
        this.render();
        this.bindEvents();
    },

    /**
     * Cache dom Elements
     */
    cacheDom: function () {
        this.inviteTemplate = document.getElementById('inviteTemplate').innerHTML;
        this.formContainer = document.getElementById('formContainer');
        console.log(this.formContainer);

    },

    /**
     * Bind event listeners
     */
    bindEvents: function () {
        $('#createAccountForm').on('submit', this.submitForm);
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
        $("#dod").change("change", function() {
            var nonDodDiv = $('#nonDodNameDiv');
            var dodNameDiv = $('#dodNameDiv');
            var companyNameInput = $('#compName');
            var orgNameDiv = $('#orgName');
            var dodEmailDiv = $('#dodEmailDiv');
            var dodEmailField = $('#dodEmail');
            var nonDodEmailDiv = $('#emailDiv');
            var nonDodEmailField = $('#email');

            if ($(this).val() == "dod") {
                dodNameDiv.show();
                orgNameDiv.attr('required', '');
                orgNameDiv.attr('data-error', 'This field is required.');

                dodEmailDiv.show();
                dodEmailField.attr('required', '');
                dodEmailField.attr('data-error', 'This field is required.');

                nonDodDiv.hide();
                companyNameInput.removeAttr('required');
                companyNameInput.removeAttr('data-error');

                nonDodEmailDiv.hide();
                nonDodEmailField.removeAttr('required');
                nonDodEmailField.removeAttr('data-error');
            } else {
                dodNameDiv.hide();
                orgNameDiv.removeAttr('required');
                orgNameDiv.removeAttr('data-error');

                dodEmailDiv.hide();
                dodEmailField.removeAttr('required');
                dodEmailField.removeAttr('data-error');

                nonDodDiv.show();
                companyNameInput.attr('required', '');
                companyNameInput.attr('data-error', 'This field is required.');

                nonDodEmailDiv.show();
                nonDodEmailField.attr('required', '');
                nonDodEmailField.attr('data-error', 'This field is required.');
            }
        });
    },



    /**
     * get params from url
     *
     */
    /*getParams:function () {
        var url_string = window.location.href;
        var url = new URL(url_string);
        this.userType = url.searchParams.get("userType");
        this.selector = url.searchParams.get("selector");
        this.validator = url.searchParams.get("validator");
    },
*/
    /**
     * render data using mustache.js
     */
    render: function () {
        var _this = this;
        var data = {
            techSeeker : 'techSeeker',
        };
        document.querySelector('#mustacheHere').outerHTML = Mustache.render(_this.inviteTemplate, data);
    },

    /**
     * Submit function
     * on success, resets fields and shows success div
     * @param event, submit event
     */
    submitForm: function (event) {
        event.preventDefault(); //prevent default action
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission
        var failure = document.getElementById("failure");
        var success = document.getElementById("success");

        /*console.log(form_data);
        console.log(failure);
        console.log(success);
        console.log(request_method);
        console.log(post_url);*/
        /*$.ajax({
            url: post_url,
            type: request_method,
            data: form_data,
        }).done(function (response) {
            console.log(response);
            if(response === 'true') {
                failure.style.display = 'none';
                success.style.display = 'block';
                document.getElementById('createAccountForm').reset();
                success.scrollIntoView(false)
            } else {
                failure.innerHTML = response;
                failure.style.display = 'block';
                failure.scrollIntoView(false);
            }
        });*/
    }
};

account.init();