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
                @slot('title', trans('frontend::frontend.package'))
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Description...</p>
                <?php $rows = []; $cols = ['ID', 'Name', 'Updated', 'Action']; ?>
                @foreach($banners as $i => $banner)
                    <?php
                    $rows[$i]['cells'][0]['value'] = '#'. $banner->getKey();
                    $rows[$i]['cells'][1]['value'] = $banner->name;
                    $rows[$i]['cells'][2]['value'] = $banner->updated_at;
                    ob_start();
                    ?>
                    @component('theme::components.dropdown')
                    @slot('id', 'dropdown-action-'. $banner->name)
                    <?php $options = [
                            ['label'    => '<i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i> '. trans('theme::theme.action.edit'), 'link'   => route('frontend.banner.edit', $banner->getKey())],
                            ['label'    => '<i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> '. trans('theme::theme.action.remove'), 'link'   => '#', 'onclick' => 'removeBanner('. $banner->getKey(). ', \''. $banner->name. '\')'],
                    ]; ?>
                    @slot('options', $options)
                    @slot('label', trans('theme::theme.action.action'))
                    @endcomponent
                    <?php $rows[$i]['cells'][3]['value'] = ob_get_clean(); ?>
                @endforeach

                @component('theme::components.layouts.list')
                @slot('model', 'banner')
                @slot('rows', $rows)
                @slot('cols', $cols)
                @slot('newLink', route('frontend.banner.new'))
                @endcomponent

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
        let api = {
            banner: {
                create: '{{ route('frontend.banner.create') }}',
                delete: '{{ route('frontend.banner.delete') }}',
            }
        };
        let message = {
            deleteTitle: "{{ trans('frontend::frontend.confirm-delete-msg') }}",
            deleteContent: "{{ trans('frontend::frontend.confirm-delete-warn-msg') }}",
            deleteBtn: "{{ trans('frontend::frontend.yes-confirm-delete-btn') }}",
        }
    </script>
    <script src="{{ asset('packages/frontend/assets/js/banner/banner.list.js')}}"></script>
@endsection