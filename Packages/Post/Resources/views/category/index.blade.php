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
                @slot('title', trans('post::post.categories'))
                @slot('notForm', true)
                @slot('content')
                    <p class="text-muted font-14 m-b-20">Description...</p>
                    <?php $rows = []; $cols = ['ID', 'Category', 'Slug', 'Updated', 'Action']; ?>
                    @foreach($cats as $i => $cat)
                        <?php
                        $rows[$i]['cells'][0]['value'] = '#'. $cat->getKey();
                        $rows[$i]['cells'][1]['value'] = $cat->name;
                        $rows[$i]['cells'][2]['value'] = '<span class="badge badge-warning">'. $cat->slug. '</span>';
                        $rows[$i]['cells'][3]['value'] = $cat->updated_at;
                        ob_start();
                        ?>
                        @component('theme::components.dropdown')
                        @slot('id', 'dropdown-action-'. $cat->name)
                        <?php $options = [
                                ['label'    => '<i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i> Edit', 'link'   => '#', 'onclick'    => 'editCat('. $cat->getKey(). ');return false;'],
                                ['label'    => '<i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Remove', 'link'   => '#', 'onclick'    => 'deleteCat('. $cat->getKey(). ', \''. $cat->name. '\');return false;'],
                        ]; ?>
                        @slot('options', $options)
                        @slot('label', 'Action')
                        @endcomponent
                        <?php $rows[$i]['cells'][4]['value'] = ob_get_clean(); ?>
                    @endforeach
                    @component('theme::components.layouts.list')
                        @slot('model', 'category')
                        @slot('rows', $rows)
                        @slot('cols', $cols)
                        @slot('btnNew')
                            @component('theme::components.button')
                            @slot('label', '<i class="fi fi-file-add"></i> '. trans('theme::theme.action.add'). ' '. trans('post::post.category'))
                            @slot('id', 'new-category-btn')
                            @slot('attributes', ['data-animation'   => 'contentscale', 'data-plugin'    => 'custommodal', 'href' => '#category-modal', 'data-overlaySpeed' => 10, 'data-overlaycolor'   => '#36404a', 'onclick' => 'newCat()'])
                            @endcomponent
                        @endslot
                    @endcomponent
                @endslot
                @endcomponent
            </div>
        </div>
    </div>
    @component('theme::components.modal')
    @slot('title', trans('theme::theme.action.add'). ' '. trans('post::post.category'))
    @slot('id', 'category-modal')
    @slot('content')
    <form class="form-horizontal" action="#" id="category-form">
        <p class="text-muted font-14 m-b-20">
            Description...
        </p>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.field')
                @slot('title', trans('theme::theme.name'))
                @slot('name', 'name')
                @slot('class', 'active')
                @slot('id', 'cat-name')
                @slot('required', true)
                @slot('value', '')
                @endcomponent
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.field')
                @slot('title', trans('theme::theme.slug'))
                @slot('name', 'slug')
                @slot('class', 'active')
                @slot('id', 'cat-slug')
                @slot('value', '')
                @endcomponent
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                @component('theme::components.field')
                @slot('title', trans('theme::theme.parent'). ' '. trans('post::post.category') )
                @slot('name', 'parent_id')
                @slot('type', 'dropdown')
                @slot('class', 'active')
                @slot('id', 'parent-category')
                <?php
                $catDropdown = [ '0'    => 'No parent'];
                foreach ($cats as $cat) {
                    $catDropdown[$cat->getKey()] = $cat->name;
                }
                ?>
                @slot('values', $catDropdown)
                @endcomponent
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 text-right">
                @component('theme::components.button')
                @slot('id', 'submit-category')
                @slot('control', 'submit')
                @slot('label', trans('theme::theme.action.add'))
                @endcomponent

                @component('theme::components.button')
                @slot('id', 'cancel-category')
                @slot('label', trans('theme::theme.action.cancel'))
                @slot('control', 'cancel')
                @slot('attributes', ['onclick' => 'Custombox.modal.close()'])
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
            cat: {
                create: '{{ route('post.category.create') }}',
                get: '{{ route('post.category.get', '') }}',
                update: '{{ route('post.category.update', '') }}',
                delete: '{{ route('post.category.delete') }}',
            }
        };

        let text = {
            add: '{{trans('theme::theme.action.add')}}',
            update: '{{trans('theme::theme.action.update')}}',
            deleteTitle: "{{ trans('post::post.confirm-delete-msg') }}",
            deleteContent: "{{ trans('post::post.confirm-delete-warn-msg') }}",
            deleteBtn: "{{ trans('post::post.yes-confirm-delete-btn') }}",
        };
    </script>
    <script src="{{ asset('packages/post/assets/js/category.crud.js')}}"></script>
@endsection