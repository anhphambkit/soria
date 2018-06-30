<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Upload Media</title>
    <link rel="shortcut icon" href="{{ asset('packages/theme/vendors/images/favicon.ico') }}">
    <link href="{{ asset('packages/theme/vendors/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/media/vendors/plugins/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/assets/css/popup.css')}}" rel="stylesheet" type="text/css" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <!-- jQuery  -->
    <script src="{{ asset('packages/theme/vendors/js/jquery.min.js')}}"></script>
</head>
<body>
<style>
    #wrapper{
        background-color: #FFF;
        padding: 20px 0;
    }
</style>
<div id="wrapper">
    <div class="container">
        <!-- Start Page content -->
        <div class="content2">
            <form class="dropzone" id="upload-file-form">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>

            <div class="row">
                <?php $mode = isset($_GET['mode']) ? $_GET['mode'] : false; ?>
                <div class="col-12 form-group ">
                    @component('media::components.media-table')
                    @slot('files', $files)
                    @slot('id', 'tb-media')
                    @slot('mode', $mode)
                    @endcomponent
                </div>
            </div>
        </div> <!-- content -->

    </div>
</div>
<!-- END wrapper -->

<script src="{{ asset('packages/theme/vendors/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('packages/media/vendors/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('packages/theme/vendors/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('packages/theme/vendors/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('packages/theme/vendors/js/sweet-alert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('packages/theme/vendors/js/axios/axios.min.js') }}"></script>
<script>
    var referral = '{{ isset($_GET['referral']) ? $_GET['referral'] : 'none' }}'; // The object will handle receive media in opener window
    Dropzone.autoDiscover = false;
    var dropzone = new Dropzone("#upload-file-form", {
        maxFilesize: {{ config('media.max_file_size') }}, // max file size (Unit: MB)
        url: '{{ route('ajax.media.upload') }}',
        method: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dictDefaultMessage: '<i class="mdi mdi-cloud-upload"></i> Drop files here to upload...',
        error: function(file, error){
            $(file.previewElement).addClass("dz-error").find('.dz-error-message').text(error.errors.file[0]);
        }
    });

    dropzone.on("queuecomplete", function(file) {
        location.reload();
    });

    var addBtn = $('i[data-action="add"]');
    addBtn.on('click', function(){
        if(referral ==='none'){
            return;
        }
        window.opener[referral].attach($(this).attr('data-id'), '{{ Storage::url('') }}' + $(this).attr('data-target'), null, null);
        if(window.opener[referral].isSingle){
            window.close();
        }
    });
</script>
</body>
</html>
