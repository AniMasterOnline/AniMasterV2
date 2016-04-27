/**
 * @author zhixin wen <wenzhixin2010@gmail.com>
 * version: 1.0.0
 */

!function ($) {

    'use strict';

    // PASSWORD CLASS DEFINITION
    // ======================

    var Password = function(element, options) {
        this.options   = options;
        this.$element  = $(element);
        this.isShown = false;

        this.init();
    };

    Password.DEFAULTS = {
        white: false, // v2
        message: 'Click here show/hide password'
    };

    Password.prototype.init = function() {
        // Create the text, icon and assign

        this.$text = $('<input type="text" class="form-control" />')
            .attr('class', this.$element.attr('class'))
            .attr('placeholder', this.$element.attr('placeholder'))
            .css('display', this.$element.css('display'))
            .val(this.$element.val()).hide();

        

        // events
        this.$text.off('keyup').on('keyup', $.proxy(function() {
            this.$element.val(this.$text.val());
        }, this));

        
    };

    Password.prototype.toggle = function(_relatedTarget) {
        this[!this.isShown ? 'show' : 'hide']();
    };

    Password.prototype.show = function(_relatedTarget) {
        var e = $.Event('show.bs.password', {relatedTarget: _relatedTarget});
        this.$element.trigger(e);

        this.isShown = true;
        this.$element.hide();
        this.$text.show();

        // v3 input-group
        this.$element.before(this.$text);
    };

    Password.prototype.hide = function(_relatedTarget) {
        var e = $.Event('hide.bs.password', {relatedTarget: _relatedTarget});
        this.$element.trigger(e);

        this.isShown = false;
        this.$element.show();
        this.$text.hide();

        // v3 input-group
        this.$text.before(this.$element);
    };


    // PASSWORD PLUGIN DEFINITION
    // =======================

    var old = $.fn.password;

    $.fn.password = function(option, _relatedTarget) {
        return this.each(function() {
            var $this = $(this),
                data = $this.data('bs.password'),
                options = $.extend({}, Password.DEFAULTS, $this.data(), typeof option === 'object' && option);

            if (!data) {
                $this.data('bs.password', (data = new Password(this, options)));
            }

            if (typeof option === 'string') {
                data[option](_relatedTarget);
            }
        });
    };

    $.fn.password.Constructor = Password;


    // PASSWORD NO CONFLICT
    // =================

    $.fn.password.noConflict = function() {
        $.fn.password = old;
        return this;
    };

}(window.jQuery);
