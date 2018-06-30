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
                @slot('title', trans('post::post.package'). 's')
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">Description...</p>
                <?php $rows = []; $cols = ['ID', 'Title', 'Created by', 'Updated', 'Action']; ?>
                @foreach($posts as $i => $post)
                    <?php
                    $rows[$i]['cells'][0]['value'] = '#'. $post->getKey();
                    $rows[$i]['cells'][1]['value'] = $post->title;
                    $rows[$i]['cells'][2]['value'] = '<span class="badge badge-warning">Minh Truong</span>';
                    $rows[$i]['cells'][3]['value'] = $post->updated_at;
                    ob_start();
                    ?>
                    @component('theme::components.dropdown')
                    @slot('id', 'dropdown-action-'. $post->title)
                    <?php $options = [
                            ['label'    => '<i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i> Edit', 'link'   => route('post.edit', $post->getKey())],
                            ['label'    => '<i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i> Remove', 'link'   => '#', 'onclick' => 'removePost('. $post->getKey(). ', \''. $post->title. '\')'],
                    ]; ?>
                    @slot('options', $options)
                    @slot('label', 'Action')
                    @endcomponent
                    <?php $rows[$i]['cells'][4]['value'] = ob_get_clean(); ?>
                @endforeach

                @component('theme::components.layouts.list')
                @slot('model', 'post')
                @slot('rows', $rows)
                @slot('cols', $cols)
                @slot('newLink', route('post.new'))
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
            post: {
                create: '{{ route('post.create') }}',
                delete: '{{ route('post.delete') }}',
            }
        };
        let message = {
            deleteTitle: "{{ trans('post::post.confirm-delete-msg') }}",
            deleteContent: "{{ trans('post::post.confirm-delete-warn-msg') }}",
            deleteBtn: "{{ trans('post::post.yes-confirm-delete-btn') }}",
        }
    </script>
    <script src="{{ asset('packages/post/assets/js/post.list.js')}}"></script>
@endsection