@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('media::media.package'))
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">{{ trans('media::media.upload-desc') }}</p>
                <div class="form-group row">
                    <div class="col-12">
                        @component('theme::components.button')
                        @slot('label', '<i class="fi fi-file-add"></i> New Media')
                        @slot('id', 'new-file-btn')
                        @endcomponent
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                    @component('media::components.media-table')
                    @slot('files', $files)
                    @slot('id', 'tb-media')
                    @endcomponent
                    </div>
                </div>
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('packages/theme/vendors/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('packages/theme/vendors/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('packages/theme/vendors/js/sweet-alert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('packages/theme/vendors/js/axios/axios.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#new-file-btn').on('click', function(){
                var w = window.open("{{ route('media.upload') }}", "popupWindow", "width=600, height=400, scrollbars=yes");
            });
        });
    </script>
@endsection