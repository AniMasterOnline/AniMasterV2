(function($){
    $(document).ready(function(){
        //Init Custom scroll Bar
        //-----------------------------------------------
        function scrollBar(selector, theme, mousewheelaxis) {
            $(selector).mCustomScrollbar({
                theme: theme,
                scrollInertia: 100,
                axis:'yx',
                mouseWheel: {
                    enable: true,
                    axis: mousewheelaxis,
                    preventDefault: true
                }
            });
        }

        if (!$('html').hasClass('ismobile')) {
            //On Custom Class
            if ($('.c-overflow')[0]) {
                scrollBar('.c-overflow', 'minimal-dark', 'y');
            }
        }
        //Fullscreen Button
        //-----------------------------------------------
        $('#FullScreen').click(function toggleFullScreen() {
            if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
             (!document.mozFullScreen && !document.webkitIsFullScreen)) {
              if (document.documentElement.requestFullScreen) {  
                document.documentElement.requestFullScreen();  
              } else if (document.documentElement.mozRequestFullScreen) {  
                document.documentElement.mozRequestFullScreen();  
              } else if (document.documentElement.webkitRequestFullScreen) {  
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
              }  
            } else {  
              if (document.cancelFullScreen) {  
                document.cancelFullScreen();  
              } else if (document.mozCancelFullScreen) {  
                document.mozCancelFullScreen();  
              } else if (document.webkitCancelFullScreen) {  
                document.webkitCancelFullScreen();  
              }  
            }
            BootstrapNotify('FullScreen Toggled!','inverse', 20,'top','left', 1000, false);
        });

        //Clear Button
        //-----------------------------------------------
        $('#ClearLocal').click(function clearlocal(){
            window.localStorage.clear();
            BootstrapNotify('Local Storage Cleaned!','inverse', 20,'top','left', 1000, false);
        });

        //Desktop Notification
        //-----------------------------------------------
        Notification.requestPermission().then(function(result) {
            console.log('Notifications: '+result);
        });
        function spawnNotification(theBody,theIcon,theTitle) {
            var options = {
                body: theBody,
                icon: theIcon
            }
            var n = new Notification(theTitle,options);
        }

        //Waves Plugin
        //-----------------------------------------------
        var config = {
            // How long Waves effect duration 
            // when it's clicked (in milliseconds)
            duration: 1000,

            // Delay showing Waves effect on touch
            // and hide the effect if user scrolls
            // (0 to disable delay) (in milliseconds)
            delay: 200,
            wait: 1000, //ms
        };
        Waves.init(config);
        Waves.attach('.btn');

        // Notify Plugin
        //-----------------------------------------------
            BootstrapNotify('Configure this in template.js','default', 20,'bottom','left', 1000, true);
            function BootstrapNotify(inMsg, inType, offset ,pl_from ,pl_align, time_Delay, allow_Close) {
                $.notify({
                    // options
                    icon: null,
                    title: null,
                    message: inMsg,
                    url: null,
                    target: '_blank'
                },{
                    // settings
                    element: 'body',
                    position: null,
                    type: inType,
                    allow_dismiss: allow_Close,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                            from: pl_from,
                            align: pl_align
                    },
                    offset: offset,
                    spacing: 10,
                    z_index: 1031,
                    delay: time_Delay,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<div class="progress" data-notify="progressbar">' +
                                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                            '</div>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>' 
                });
                return false;
            }
            /*
            * Top Search
            */
           (function(){
               $('body').on('click', '#top-search > a', function(e){
                   e.preventDefault();

                   $('#header').addClass('search-toggled');
                   $('#top-search-wrap input').focus();
               });

               $('body').on('click', '#top-search-close', function(e){
                   e.preventDefault();

                   $('#header').removeClass('search-toggled');
               });
           })();
            console.log('Ready!');
    }); // End document ready
    
    
    
    //Load Content
    //-----------------------------------------------
    $(window).load(function() {
        $(".page-loader").fadeOut("slow");
    });
    
})(this.jQuery);


