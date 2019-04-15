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

        var reason2 = $('#reason2');
        var reason1 = $('#reason1');
        var reason3 = $('#reason3');
        var url_string = window.location.href;
        var url = new URL(url_string);

        if(url.searchParams.get("level4") !== 0){
            reason1.hide();
            reason2.hide();
            reason3.hide();

        }

        $("#reason1").click("change", function() {
            var reason2 = $('#reason2');
            var reason1 = $('#reason1');
            var reason3 = $('#reason3');

            if(url.searchParams.get("level4") !== 0){
                reason1.hide();
                reason2.hide();
                reason3.hide();
                this.preventDefault()
            }

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