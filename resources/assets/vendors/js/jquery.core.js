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
    initSwitchery: function() {
        let defaults = {
            color             : '#64bd63',
            className         : 'switchery switchery-custom',
            size              : 'default'
        }

        $('[data-plugin="switchery"]').each(function() {
            let config = Object.assign(defaults, $(this).data());
            new Switchery($(this)[0], config)
        })
    },
    initCkEditor5: function(el = null) {
        let element = (el !== null) ? el : '.ck-editor';
        ClassicEditor
            .create( document.querySelector( element ), {
                ckfinder: {
                    uploadUrl: '/ajax/upload/image'
                }
            })
            .then( editor => {
                // console.log( editor );
            } )
            .catch( error => {
                // console.error( error );
            } );
    },
    initCkEditor4: function(el = null) {
        CKFinder.setupCKEditor();
        CKEDITOR.replace( el );
    },
    init: function() {
        this.initTooltipPlugin(),
            this.initPopoverPlugin(),
            this.initCustomModalPlugin(),
            this.initSwitchery()
    }
}

core.init();