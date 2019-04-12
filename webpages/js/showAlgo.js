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

        var reason1Div = $('#reason1Div');
        var reason2Div = $('#reason2Div');
        var reason3Div = $('#reason3Div');
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
            var reason1Div = $('#reason1Div');
            var reason2Div = $('#reason2Div');
            var reason3Div = $('#reason3Div');
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

    }
};

account.init();