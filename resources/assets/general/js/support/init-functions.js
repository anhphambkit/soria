let initFunctions = {
    ttInputCounter : function (element) {
        element.find('.minus-btn, .plus-btn').on('click',function(e) {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val(), 10) + parseInt(e.currentTarget.className === 'plus-btn' ? 1 : -1, 10);
            $input.val(count).change();
        });
        element.find("input").change(function() {
            var _ = $(this);
            var min = 1;
            var val = parseInt(_.val(), 10);
            var max = parseInt(_.attr('size'), 10);
            val = Math.min(val, max);
            val = Math.max(val, min);
            _.val(val);
        })
            .on("keypress", function( e ) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                }
            });
    },
}

export { initFunctions };