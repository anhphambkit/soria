"use strict";

var core = {
    initTooltipPlugin: function() {
        $('[data-toggle="tooltip"]').tooltip()
    },
    initPopoverPlugin: function() {
        $('[data-toggle="popover"]').popover()
    },
    initCustomModalPlugin: function() {
        $('[data-plugin="custommodal"]').on("click", function(event) {
            window.modal = new Custombox.modal({
                content: {
                    target: $(this).attr("href"),
                    effect: $(this).attr("data-animation"),
                    overlaySpeed: $(this).attr("data-overlaySpeed"),
                    overlayColor: $(this).attr("data-overlayColor")
                }
            });
            modal.open();
            event.preventDefault()
        });
    },
    initSlimScrollPlugin: function() {
        $(".slimscroll-alt").slimScroll({
            position: "right",
            size: "5px",
            color: "#98a6ad",
            wheelStep: 10
        })
    },
    initSwitchery: function() {
        $('[data-plugin="switchery"]').each(function() {
            new Switchery($(this)[0], $(this).data())
        })
    },
    initKnob: function() {
        $('[data-plugin="knob"]').each(function() {
            $(this).knob()
        })
    },
    initCounterUp: function() {
        $(this).attr("data-delay") ? $(this).attr("data-delay") : 100,
            $(this).attr("data-time") ? $(this).attr("data-time") : 1200;
        $('[data-plugin="counterup"]').each(function() {
            $(this).counterUp({
                delay: 100,
                time: 1200
            })
        })
    },
    init: function() {
        this.initTooltipPlugin(),
            this.initPopoverPlugin(),
            this.initSlimScrollPlugin(),
            this.initCustomModalPlugin(),
            this.initSwitchery(),
            this.initKnob(),
            this.initCounterUp()
    }
}

core.init();