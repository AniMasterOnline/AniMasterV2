(function($){
    $(document).ready(function(){

            // Notify Plugin
            //-----------------------------------------------
            if (($(".main-navigation.onclick").length>0) && !Modernizr.touch ){
                    $.notify({
                            // options
                            message: 'The Dropdowns of the Main Menu, are now open with click on Parent Items. Click "Home" to checkout this behavior.'
                    },{
                            // settings
                            type: 'info',
                            delay: 10000,
                            offset : {
                                    y: 150,
                                    x: 20
                            }
                    });
            };
            if (!($(".main-navigation.animated").length>0) && !Modernizr.touch && $(".main-navigation").length>0){
                    $.notify({
                            // options
                            message: 'The animations of main menu are disabled.'
                    },{
                            // settings
                            type: 'info',
                            delay: 10000,
                            offset : {
                                    y: 150,
                                    x: 20
                            }
                    });
            };
            if ($(".btn-alert").length>0){
                    $(".btn-alert").on('click', function(event) {
                            $.notify({
                                    // options
                                    message: 'Great! you have just created this message :-) you can configure this into the template.js file'
                            },{
                                    // settings
                                    type: 'info',
                                    delay: 4000,
                                    offset : {
                                            y: 100,
                                            x: 20
                                    }
                            });
                            return false;
                    });
            };		

            // Remove Button
            //-----------------------------------------------
            $(".btn-remove").click(function() {
                    $(this).closest(".remove-data").remove();
            });
            console.log('Ready!');
    }); // End document ready
})(this.jQuery);


