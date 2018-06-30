@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/custombox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('packages/theme/vendors/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('theme::theme.name'))
                @slot('notForm', true)
                @slot('content')
                    <p class="text-muted font-14 m-b-20">{{  trans('theme::theme.desc') }}...</p>
                    <?php $rows = []; $cols = ['ID', 'Name', 'Updated', 'Action']; ?>
                    @foreach($manufacturers as $i => $manufacturer)
                        <?php
                        $rows[$i]['cells'][0]['value'] = '#'. $manufacturer->getKey();
                        $rows[$i]['cells'][1]['value'] = $manufacturer->name;
                        $rows[$i]['cells'][2]['value'] = $manufacturer->updated_at;
                        ob_start();
                        ?>
                        @component('theme::components.dropdown')
                        @slot('id', 'dropdown-action-'. $manufacturer->name)
                        <?php $options = [
                                ['label'    => '<i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i> '. trans('theme::theme.action.edit'), 'link'   => '#', 'onclick'    => 'editManufacturer('. $manufacturer->getKey(). ');return false;'],
                                ['label'    => '<i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> '. trans('theme::theme.action.remove'), 'link'   => '#', 'onclick'    => 'deleteManufacturer('. $manufacturer->getKey(). ', \''. $manufacturer->name. '\');return false;'],
                        ]; ?>
                        @slot('options', $options)
                        @slot('label', trans('theme::theme.action.edit'))
                        @endcomponent
                        <?php $rows[$i]['cells'][3]['value'] = ob_get_clean(); ?>
                    @endforeach
                    @component('theme::components.layouts.list')
                        @slot('model', 'manufacturer')
                        @slot('rows', $rows)
                        @slot('cols', $cols)
                        @slot('btnNew')
                            @component('theme::components.button')
                            @slot('label', '<i class="fi fi-file-add"></i> '. trans('theme::theme.action.add'). ' '. trans('product::product.manufacturer'))
                            @slot('id', 'new-manufacturer-btn')
                            @slot('attributes', ['data-animation'   => 'contentscale', 'data-plugin'    => 'custommodal', 'href' => '#manufacturer-modal', 'data-overlaySpeed' => 10, 'data-overlaycolor'   => '#36404a', 'onclick' => 'newManufacturer()'])
                            @endcomponent
                        @endslot
                    @endcomponent
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
    @component('theme::components.modal')
    @slot('title', trans('theme::theme.action.add'). ' '. trans('product::product.manufacturer'))
    @slot('id', 'manufacturer-modal')
    @slot('content')
    <form class="form-horizontal" action="#" id="manufacturer-form">
        <p class="text-muted font-14 m-b-20">
            {{ trans('theme::theme.desc') }}
        </p>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.field')
                @slot('title', trans('theme::theme.name'))
                @slot('name', 'name')
                @slot('class', 'active')
                @slot('id', 'manufacturer-name')
                @slot('required', true)
                @slot('value', '')
                @endcomponent
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.field')
                @slot('title', trans('theme::theme.desc'))
                @slot('name', 'desc')
                @slot('class', 'active')
                @slot('id', 'manufacturer-desc')
                @slot('value', '')
                @endcomponent
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.field')
                @slot('title', trans('theme::theme.country'))
                @slot('name', 'country')
                @slot('class', 'active')
                @slot('id', 'manufacturer-country')
                @slot('value', '')
                @endcomponent
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.import-images')
                @slot('id', 'manufacturer-single-image')
                @slot('objMedia', 'manufacturerImage')
                @endcomponent

                <div id="manufacturer-source-template"></div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 text-right">
                @component('theme::components.button')
                @slot('id', 'submit-manufacturer')
                @slot('control', 'submit')
                @slot('label', trans('theme::theme.action.add'))
                @endcomponent

                @component('theme::components.button')
                @slot('id', 'cancel-manufacturer')
                @slot('label', trans('theme::theme.action.cancel'))
                @slot('control', 'cancel')
                @slot('attributes', ['onclick' => 'Custombox.close();'])
                @endcomponent
            </div>
        </div>
    </form>
    @endslot
    @endcomponent
@endsection

@section('scripts')
    <script src="{{ asset('packages/theme/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('packages/theme/vendors/js/custombox.min.js')}}"></script>
    <script src="{{ asset('packages/theme/vendors/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('packages/theme/vendors/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('packages/theme/vendors/js/sweet-alert/sweetalert2.min.js') }}"></script>
    <script>
        let api = {
        manufacturer: {
                create: '{{ route('product.manufacturer.create') }}',
                get: '{{ route('product.manufacturer.get', '') }}',
                update: '{{ route('product.manufacturer.update', '') }}',
                delete: '{{ route('product.manufacturer.delete') }}',
            }
        };

        let text = {
            add: '{{trans('theme::theme.action.add')}}',
            update: '{{trans('theme::theme.action.update')}}',
            deleteTitle: "{{ trans('product::product.confirm-delete-msg') }}",
            deleteContent: "{{ trans('product::product.confirm-delete-warn-msg') }}",
            deleteBtn: "{{ trans('product::product.yes-confirm-delete-btn') }}",
        };
    </script>
    <script src="{{ asset('packages/product/assets/js/manufacturer/manufacturer.crud.js')}}"></script>
@endsection