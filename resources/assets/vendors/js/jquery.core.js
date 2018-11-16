"use strict";

window.swObjs = {};

let core = {
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
            let init = new Switchery($(this)[0], config);
            swObjs[$(this)[0].id] = init;
        })
    },
    initSelect2: function() {
        let defaults = {
            width: '100%',
        }

        $('[data-plugin="select2"]').each(function() {
            let config = Object.assign(defaults, $(this).data());
            $(this).select2(config);
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
    initDropzoneImplement : function(el = null) {
        let element = (el !== null) ? el : '.bb-dropzone .bb-upload';
        // DropZone implementation
        $(element).on('dragover', function (e) {
            $(this).addClass('bb-dragover');
        }).on('dragleave', function (e) {
            $(this).removeClass('bb-dragover');
        }).on('drop', function (e) {
            $(this).removeClass('bb-dragover');
        });
    },
    initFileUploadWidget : function(el = null, nameInput = 'file') {
        $(document).ready(function() {
            let element = (el !== null) ? el : '.bb-file-upload-widget';
            // Upload media:
            $(element + ' .bb-btn-file-input').fileupload({
                dropZone: $(element + ' .bb-upload-block'),
                autoUpload: false,
                dataType: 'json',
                singleFileUploads: true,
                acceptFileTypes: /(jpeg)|(png)|(gif)|(jpg)$/i,
                add: function (e, data) {
                    $(element + ' .bb-uploading-files-container').show();
                    var jqXHR;

                    $.each(data.files, function (index, file) {
                        var fileUploadInfo = '<div id="file-uploading-' + file.lastModified + '" class="bb-uploading-progress-block"> \
                            <span class="bb-filename">' + file.name + '</span> \
                            <div class="bb-progress bb-progress-inline"> \
                            <div class="progress bb-progress-sm"> \
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0" aria-valuenow="00" aria-valuemin="0" aria-valuemax="100"></div> \
                            </div> \
                            <span class="bb-amount">0%</span> \
                            </div> \
                            <div class="bb-cancel-block"> \
                                <a class="bb-icon la la-close"></a> \
                            </div> \
                    </div>';
                        data.context = $(fileUploadInfo).appendTo($(element + ' .bb-uploading-files'));

                        $(data.context).find(".bb-cancel-block").click(function () {
                            jqXHR.abort();
                            data.context.remove();
                        })
                    });

                    data.process().done(function () {
                        jqXHR = data.submit();
                    });
                },
                progress: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    var size = data.files[0].size;
                    var uploadedBytes = (size / 100) * progress;
                    var id = 'file-uploading-' + data.files[0].lastModified;

                    $('#' + id).find('.progress-bar').css('width', progress + '%');
                    $('#' + id).find('.bb-amount').text(progress + '%');
                },
                stop: function (e) {
                    $(element + ' .bb-uploading-files-container').hide();
                },
                done: function (e, data) {
                    $.each(data.files, function (index, file) {
                        var id = 'file-uploading-' + data.files[0].lastModified;
                        $('#' + id).remove();
                    });

                    var uploadedFileInfo = '<li class="bb-file bb-file-' + name + '"> \
                        \<input type="text" hidden value="' + data.result.file.fileID + '" name="' + nameInput + '[]"> \
                        <img class="bb-thumb" src="../' + data.result.file.url + '" > \
                            <a class="bb-icon la la-trash bb-remove"></a> \
                        </li>';
                    $(uploadedFileInfo).appendTo($(element + ' .bb-files ul'));

                    new Noty({
                        text: 'File ' + data.result.file.name + ' has been uploaded successfully!',
                        type: 'success',
                        theme: 'mint',
                        layout: 'topRight',
                        timeout: 2000
                    }).show();
                },
                fail: function (e, data) {
                    $.each(data.files, function (index, file) {
                        var id = 'file-uploading-' + data.files[0].lastModified;
                        $('#' + id).addClass('bb-file-uploading-error');
                    });

                    new Noty({
                        text: 'Uploading error! Please try again later.',
                        type: 'error',
                        theme: 'mint',
                        layout: 'topRight',
                        timeout: 2000
                    }).show();
                }
            });

            $(document).on('click', element + ' .bb-files .bb-file-' + name + ' .bb-remove', function () {
                var file = $(this).closest('li');

                $.confirm({
                    title: 'Danger!',
                    content: 'Are you sure you want to remove this file?',
                    type: 'danger',
                    buttons: {
                        confirm: {
                            text: 'Yes, remove',
                            btnClass: 'btn-danger',
                            action: function () {
                                file.remove();
                            }
                        },
                        cancel: function () {
                        }
                    }
                });
            });
        });
    },
    initBindDropDrag : function() {
        $(document).bind('drop dragover', function (e) {
            e.preventDefault();
        });
    },
    init: function() {
        this.initTooltipPlugin(),
        this.initPopoverPlugin(),
        this.initCustomModalPlugin(),
        this.initSwitchery(),
        this.initSelect2()
    }
}

core.init();