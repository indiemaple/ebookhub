(function ($) {
    var Ebookhub = {
        init: function () {
            var self = this;

            self.initLightBox();
        },

        /**
         * lightbox
         */
        initLightBox: function(){
            $(document).delegate('.content-body img:not(.emoji)', 'click', function(event) {
                event.preventDefault();
                return $(this).ekkoLightbox({
                    onShown: function() {
                        if (window.console) {
                            // return console.log('Checking our the events huh?');
                        }
                    }
                });
            });
            $(document).delegate('.appends-container img:not(.emoji)', 'click', function(event) {
                event.preventDefault();
                return $(this).ekkoLightbox({
                    onShown: function() {
                        if (window.console) {
                            // return console.log('Checking our the events huh?');
                        }
                    }
                });
            });
        },
    };
    window.Ebookhub = Ebookhub;
})(jQuery);

$(document).ready(function () {
    Ebookhub.init();
});