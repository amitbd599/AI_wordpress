;(function($){
    "use strict";

    $(document).ready(function(){
        $(document).on('click', '[data-slug="tp-core"] .activate a', function(e){
            e.preventDefault();
            $('#register-modal').show();
        });

        $('.tp-modal-close').on('click', function(){
            $('#register-modal').hide();
        })
    })

    $(window).on('click', function(e){
        if(e.target == document.getElementById('register-modal')){
            $('#register-modal').hide();
        }
    })

})(jQuery)