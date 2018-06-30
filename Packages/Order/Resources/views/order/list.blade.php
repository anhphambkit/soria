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
                @slot('title', trans('order::order.package'))
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Description...</p>
                <?php $rows = []; $cols = ['ID', 'Title', 'Updated', 'Actions']; ?>
                @foreach($orders as $i => $order)
                    <?php
                    $rows[$i]['cells'][0]['value'] = '#'. $order->getKey();
                    $rows[$i]['cells'][1]['value'] = $order->title;
                    $rows[$i]['cells'][2]['value'] = $order->updated_at;
                    ob_start();
                    ?>
                    @component('theme::components.dropdown')
                    @slot('id', 'dropdown-action-'. $order->name)
                    <?php $options = [
                            ['label'    => '<i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i> '. trans('theme::theme.action.edit'), 'link'   => route('order.order.edit', $order->getKey())],
                            ['label'    => '<i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> '. trans('theme::theme.action.remove'), 'link'   => '#', 'onclick' => 'removeOrder('. $order->getKey(). ', \''. $order->name. '\')'],
                    ]; ?>
                    @slot('options', $options)
                    @slot('label', trans('theme::theme.action.action'))
                    @endcomponent
                    <?php $rows[$i]['cells'][3]['value'] = ob_get_clean(); ?>
                @endforeach

                @component('theme::components.layouts.list')
                @slot('model', 'order')
                @slot('rows', $rows)
                @slot('cols', $cols)
                @slot('newLink', route('order.order.new'))
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
            order: {
                create: '{{ route('order.order.create') }}',
                delete: '{{ route('order.order.delete') }}',
            }
        };
        let message = {
            deleteTitle: "{!! trans('theme::theme.confirm-delete-msg') !!}",
            deleteContent: "{!! trans('theme::theme.confirm-delete-warn-msg') !!}",
            deleteBtn: "{!! trans('theme::theme.yes-confirm-delete-btn') !!}",
        }
    </script>
    <script src="{{ asset('packages/order/assets/js/order/order.list.js')}}"></script>
@endsection