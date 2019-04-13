var account = {



    /**
     * Initialize
     */
    init: function () {
        //this.cacheDom();
        //this.getParams();
        //this.render();
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

        $("#firstSteps").change("change", function() {
            var step1Div = $('#step1Div');
            var step2Div = $('#step2Div');
            var step2 = $('#step2');
            var step1 = $('#step1');
            var step3Div = $('#step3Div');
            var step3 = $('#step3');
            var url_string = window.location.href;
            var url = new URL(url_string);

            if(url.searchParams.get("level4") != 0){
                step1Div.hide();
                step1.removeAttr('required', '');
                step1.removeAttr('data-error', 'This field is required.');

                step3Div.hide();
                step3.removeAttr('required');
                step3.removeAttr('data-error', 'This field is required.');

                step2Div.hide();
                step2.removeAttr('required');
                step2.removeAttr('data-error', 'This field is required.');

                $("#error").show();

                $("#ask").hide();
                $("#ask").removeAttr('required');
                $("#ask").removeAttr('data-error', 'This field is required.');

            }else {
                if ($(this).val() == "3") {
                    step2Div.show();
                    step2.attr('required', '');
                    step2.attr('data-error', 'This field is required.');

                    step3Div.show();
                    step3.attr('required', '');
                    step3.attr('data-error', 'This field is required.');

                    step1Div.show();
                    step1.attr('required', '');
                    step1.attr('data-error', 'This field is required.');

                } else if ($(this).val() == "2") {
                    step2Div.show();
                    step2.attr('required');
                    step2.attr('data-error', 'This field is required.');

                    step3Div.hide();
                    step3.removeAttr('required');
                    step3.removeAttr('data-error', 'This field is required.');

                    step1Div.show();
                    step1.attr('required', '');
                    step1.attr('data-error', 'This field is required.');

                } else if ($(this).val() == "1") {
                    step2Div.hide();
                    step2.removeAttr('required');
                    step2.removeAttr('data-error', 'This field is required.');

                    step3Div.hide();
                    step3.removeAttr('required');
                    step3.removeAttr('data-error', 'This field is required.');

                    step1Div.show();
                    step1.attr('required', '');
                    step1.attr('data-error', 'This field is required.');

                } else {
                    step1Div.hide();
                    step1.removeAttr('required', '');
                    step1.removeAttr('data-error', 'This field is required.');

                    step3Div.hide();
                    step3.removeAttr('required');
                    step3.removeAttr('data-error', 'This field is required.');

                    step2Div.hide();
                    step2.removeAttr('required');
                    step2.removeAttr('data-error', 'This field is required.');
                }
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