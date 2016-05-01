(function($){
    $(document).ready(function(){
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
                BootstrapNotify('Configure this in template.js','default', 20,'bottom','left', 1000);
                function BootstrapNotify(inMsg, inType, offset ,pl_from ,pl_align, time_Delay) {
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
                        allow_dismiss: true,
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
            
            console.log('Ready!');
    }); // End document ready
})(this.jQuery);


