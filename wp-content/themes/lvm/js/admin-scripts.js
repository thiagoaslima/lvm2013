// admin-scripts.js

(function (w, doc, $, undefined) {
    'use strict';

    var repeatable = function ($el) {
        var el = $el.eq(0).clone(),
            dom = $el.last(),
            group = el.find('.group'),
            number = ~~group.attr('data-number');

        // el.find()

        el.find('[data-default]').each(function () {
            var data = $(this).attr('data-default'),
                attr = data.split(':')[0],
                value = (data.split(':')[1] === 'null') ? '' : data.split(':')[1];

            switch(attr) {
                case 'option' :
                    $(this).find("option:selected").prop("selected", false).end().
                            find("option[value=" + value + "]").prop("selected", true);
                    break;

                case 'value' :
                    $(this).attr('value', value);
                    break;
            }
        });

        el.find('.group').

        dom.after(el);
    }

    /* expose functions and variables */
    w.lvm_helpers = {
        repeatable: repeatable
    };

}(this, this.document, this.jQuery));