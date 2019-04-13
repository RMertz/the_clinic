var account = {



    /**
     * Initialize
     */
    init: function () {

        this.bindEvents();
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

};

account.init();