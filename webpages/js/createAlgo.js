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

            } else if ($(this).val() == "2"){
                step2Div.show();
                step2.attr('required');
                step2.attr('data-error');

                step3Div.hide();
                step3.removeAttr('required');
                step3.removeAttr('data-error');

                step1Div.show();
                step1.attr('required', '');
                step1.attr('data-error', 'This field is required.');

            }else{
                step1Div.show();
                step1.attr('required', '');
                step1.attr('data-error', 'This field is required.');

                step3Div.hide();
                step3.removeAttr('required');
                step3.removeAttr('data-error');

                step2Div.hide();
                step2.removeAttr('required');
                step2.removeAttr('data-error');
            }
        });
    },

};

account.init();