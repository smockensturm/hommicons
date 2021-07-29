/**
 * HOMM Icons plugin for Craft CMS 3.x
 *
 * HOMMIconsField Field JS
 *
 * @author    Domenik Hofer
 * @copyright Copyright (c) 2019 Domenik Hofer
 * @link      https://github.com/HOMMinteractive
 * @package   HOMMIcons
 * @since     1.0.0
 */

;(function ($, window, document, undefined) {

    var pluginName = "HOMMIconsField",
        defaults = {};

    // Plugin constructor
    function Plugin(element, options) {
        this.element = element;

        this.options = $.extend({}, defaults, options);

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {

        init: function (id) {
            var _this = this;

            $(function () {

                /* -- _this.options gives us access to the $jsonVars that our FieldType passed down to us */

            });
        }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                    new Plugin(this, options));
            }
        });
    };

})(jQuery, window, document);

$(function () {

    var iconpickerField_modals = [];

    $(document).on('click', '.iconpickerField_modaltoggle', function () {
        var p = $(this).parent();
        if (p.data('modal-id') !== undefined) {
            iconpickerField_modals[p.data('modal-id')].show();
        } else {
            var m = p.find('.iconpickerField_modal');
            var modal = new Craft.IconpickerModal(m, p);
            iconpickerField_modals.push(modal);
            p.data('modal-id', iconpickerField_modals.length - 1);
        }
    });

    // Close visible modal when clicking on close button
    $(document).on('click', '.locationField_modal_close', function () {
        Garnish.Modal.visibleModal.hide();
    });

    // Remove the selected icon
    $(document).on('click', '.iconpickerField_removeicon', function () {
        var p = $(this).parent();
        $(p).find('.iconpicker-icon').val('');
        $(p).find('.iconpicker-msg .iconpicker-preview').html('');
        $(p).find('.iconpicker-msg .iconpicker-code').html('');
        $(p).find('.iconpicker-msg').addClass('homm-iconpicker--empty');
        $(this).addClass('homm-iconpicker--empty');
    });
});


Craft.IconpickerModal = Garnish.Modal.extend(
    {
        icon: null,
        iconField: null,
        iconSelectedClass: 'iconpicker--selected',

        $selectBtn: null,
        $cancelBtn: null,

        init: function (container, field, settings) {
            this.iconField = field;
            this.setSettings(settings, Craft.IconpickerModal.defaults);

            // Build the modal
            this.base(container, this.settings);

            this.$cancelBtn = $(container).find('.iconpickerField_modal_close');
            this.$selectBtn = $(container).find('.iconpickerField_modal_select');

            this.addListener(this.$cancelBtn, 'activate', 'cancel');
            this.addListener(this.$selectBtn, 'activate', 'selectIcon');
        },

        onFadeIn: function () {
            var self = this;
            // If there is already an icon selected then use that one as the selected icon
            if ($(this.$container).find('.homm-iconpicker span.' + this.iconSelectedClass).length > 0) {
                this.enableSelectBtn();
            }

            // Listen if an icon is clicked. If so then enable the selecticon button
            $(this.$container).find('.homm-iconpicker span').click(function () {

                // Set selected class
                $(this).parent().find('span').removeClass(self.iconSelectedClass);
                $(this).addClass(self.iconSelectedClass);

                // Set icon value and enable select button
                self.icon = $(this).data('val');
                self.iconSvg = $(this).find('svg').parent().html();
                self.enableSelectBtn();
            });
        },

        enableSelectBtn: function () {
            this.$selectBtn.removeClass('disabled');
        },

        disableSelectBtn: function () {
            this.$selectBtn.addClass('disabled');
        },

        cancel: function () {
            this.hide();
        },

        selectIcon: function () {
            $(this.iconField).find('.iconpicker-icon').val(this.icon);
            $(this.iconField).find('.iconpicker-msg').removeClass('homm-iconpicker--empty');
            $(this.iconField).find('.iconpickerField_removeicon').removeClass('homm-iconpicker--empty');
            $(this.iconField).find('.iconpicker-msg .iconpicker-preview').html(this.iconSvg);
            $(this.iconField).find('.iconpicker-msg .iconpicker-code').html(this.icon);
            this.hide();
        },
    },
    {
        defaults: {
            resizable: true,
            hideOnSelect: true,
            onCancel: $.noop,
            onSelect: $.noop,
        }
    }
);