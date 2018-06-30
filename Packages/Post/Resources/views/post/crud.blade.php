@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/post/assets/css/post.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('post::post.package'). 's')
                @slot('isActive', true)
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">...</p>
                <form role="form" id="post-form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.status') )
                            @slot('name', 'status')
                            @slot('class', 'active')
                            @slot('type', 'dropdown')
                            @slot('id', 'post-status')
                            <?php
                            $catDropdown = [ 'P'    => trans('post::post.publish'), 'D'   => trans('post::post.draft')];
                            ?>
                            @slot('values', $catDropdown)
                            @if(isset($post))
                                @slot('value', $post->status)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('post::post.category') )
                            @slot('name', 'cat_id')
                            @slot('class', 'active')
                            @slot('type', 'dropdown')
                            @slot('id', 'post-categories')
                            <?php
                            $catDropdown = [];
                            foreach ($cats as $cat) {
                                $catDropdown[$cat->getKey()] = $cat->name;
                            } ?>
                            @slot('values', $catDropdown)

                            @if(isset($post))
                                @slot('value', $post->cat_id)
                            @endif

                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.slug'))
                            @slot('name', 'slug')
                            @slot('id', 'post-slug')
                            @slot('class', 'active')
                            @slot('required', true)
                            @if(isset($post))
                                @slot('value', $post->slug)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.button')
                            @slot('id', 'thumbnail-btn')
                            @slot('type', 'button')
                            @slot('label', '<i class="fi fi-image"></i> '. trans('post::post.thumb-image'))
                            @slot('attributes', ['onclick' => 'postImage.isSingle=true;windowUtil.openPopupWindow(\''. route('media.upload').'?mode=add&referral=postImage\')'])
                            @endcomponent
                            <div class="row"><div class="col-12" id="thumbnail-panel"></div></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.name'))
                            @slot('name', 'title')
                            @slot('class', 'active')
                            @slot('id', 'post-title')
                            @slot('required', true)
                            @if(isset($post))
                                @slot('value', $post->title)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-8">
                            @component('theme::components.field')
                            @slot('title', trans('post::post.short-desc') )
                            @slot('name', 'desc')
                            @slot('id', 'post-short-desc')
                            @if(isset($post))
                                @slot('value', $post->desc)
                            @else
                                @slot('value', '')
                            @endif
                            @slot('class', 'active')
                            @endcomponent
                        </div>
                        <div class="col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('post::post.keywords') )
                            @slot('name', 'keywords')
                            @slot('id', 'post-keywords')
                            @if(isset($post))
                                @slot('value', $post->keywords)
                            @else
                                @slot('value', '')
                            @endif
                            @slot('class', 'active')
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', trans('post::post.content') )
                            @slot('name', 'content')
                            @slot('id', 'post-content')
                            @slot('type', 'editor')
                            @if(isset($post))
                                @slot('value', $post->content)
                            @else
                                @slot('value', '')
                            @endif
                            @slot('class', 'active')
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'submit-post')
                            @slot('control', 'submit')
                            @if(isset($post))
                                @slot('label', trans('theme::theme.action.update'))
                            @else
                                @slot('label', trans('theme::theme.action.create'))
                            @endif
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'back-post')
                            @slot('label', trans('theme::theme.back'))
                            @slot('attributes', ['onclick' => 'window.location.href=listUrl' ])

                            @endcomponent
                        </div>
                    </div>
                </form>
                @endslot
                @endcomponent
            </div>
        </div>
    </div>

@endsection

@section('plugin-scripts')
    <script src="{{ asset('packages/theme/vendors/js/select2.min.js')}}"></script>
    <script src="{{ asset('packages/theme/vendors/js/switchery.min.js')}}"></script>
    <script src="{{ asset('packages/theme/vendors/js/tinymce/tinymce.min.js')}}"></script>
@endsection

@section('scripts')
    <script id="thumb-img-template" type="text/x-handlebars-template">
        <div class="post-image-panel">
            <img src="@{{ link }}" class="post-image-control feature-image" />
            <i class="fi fi-cross" data-post-image-id="@{{ id }}" data-post-image-type="thumb" data-post-image-control="remove"></i>
        </div>

    </script>
    <script>
        let updateMode = {!! isset($post) ? 'true': 'false' !!};

        @if(isset($post))
        let post = {
            @if(empty($post->img_id))
            thumbImg: null,
            @else
            thumbImg: {
                id: {{ $post->img_id }},
                link: '{{ asset('storage/'. $post->thumbImg()->path_org) }}'
            },
            @endif
        };
        @endif
        let api = {
            post: {
                create: '{{ route('post.create') }}',
                @if(isset($post))
                update: '{{ route('post.update', $post->getKey()) }}',
                @endif
            }
        };
        let listUrl = '{{ route('post.index') }}';
    </script>
    <script src="{{ asset('packages/post/assets/js/post.crud.js')}}"></script>
@endsection