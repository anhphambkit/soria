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
                @slot('title', trans('product::product.package'). 's')
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Description...</p>
                <?php $rows = []; $cols = ['ID', 'Name', 'Created by', 'Updated', 'Action']; ?>
                @foreach($products as $i => $product)
                    <?php
                    $rows[$i]['cells'][0]['value'] = '#'. $product->getKey();
                    $rows[$i]['cells'][1]['value'] = $product->name;
                    $rows[$i]['cells'][2]['value'] = '<span class="badge badge-warning">Minh Truong</span>';
                    $rows[$i]['cells'][3]['value'] = $product->updated_at;
                    ob_start();
                    ?>
                    @component('theme::components.dropdown')
                    @slot('id', 'dropdown-action-'. $product->name)
                    <?php $options = [
                            ['label'    => '<i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i> Edit', 'link'   => route('product.edit', $product->getKey())],
                            ['label'    => '<i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Remove', 'link'   => '#', 'onclick' => 'removeProduct('. $product->getKey(). ', \''. $product->name. '\')'],
                    ]; ?>
                    @slot('options', $options)
                    @slot('label', 'Action')
                    @endcomponent
                    <?php $rows[$i]['cells'][4]['value'] = ob_get_clean(); ?>
                @endforeach

                @component('theme::components.layouts.list')
                @slot('model', 'product')
                @slot('rows', $rows)
                @slot('cols', $cols)
                @slot('newLink', route('product.new'))
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
            product: {
                create: '{{ route('product.create') }}',
                delete: '{{ route('product.delete') }}',
            }
        };
        let message = {
            deleteTitle: "{{ trans('product::product.confirm-delete-msg') }}",
            deleteContent: "{{ trans('product::product.confirm-delete-warn-msg') }}",
            deleteBtn: "{{ trans('product::product.yes-confirm-delete-btn') }}",
        }
    </script>
    <script src="{{ asset('packages/product/assets/js/product.list.js')}}"></script>
@endsection