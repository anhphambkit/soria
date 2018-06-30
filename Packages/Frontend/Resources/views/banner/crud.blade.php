@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/frontend/assets/css/banner.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('frontend::frontend.package'))
                @slot('isActive', true)
                @slot('content')

                <p class="text-muted font-14 m-b-20">...</p>
                <form role="form" id="banner-form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Name')
                            @slot('name', 'name')
                            @slot('id', 'banner-name')
                            @slot('required', true)
                            @if(isset($banner))
                                @slot('value', $banner->name)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.desc'))
                            @slot('name', 'desc')
                            @slot('id', 'banner-desc')
                            @slot('required', false)
                            @if(isset($banner))
                                @slot('value', $banner->desc)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'URL')
                            @slot('name', 'link')
                            @slot('id', 'banner-link')
                            @slot('required', false)
                            @if(isset($banner))
                                @slot('value', $banner->link)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'Slug')
                            @slot('name', 'slug')
                            @slot('id', 'banner-slug')
                            @slot('required', true)
                            @if(isset($banner))
                                @slot('value', $banner->slug)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('frontend::frontend.use-multiple-images'))
                            @slot('name', 'type')
                            @slot('type', 'checkbox')
                            @slot('id', 'banner-type')
                            @if(isset($banner))
                                @slot('checked', $banner->type === 'M')
                            @else
                                @slot('checked', false)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.import-images')
                            @slot('id', 'baner-single-image')
                            @slot('objMedia', 'bannerImage')
                            @endcomponent
                        </div>
                    </div>

                    <div class="row" id="multiple-banner">
                        <div class="form-group col-md-12">
                            @component('theme::components.button')
                            @slot('id', 'add-banner-image')
                            @slot('label', trans('theme::theme.action.add'))
                            @endcomponent
                        </div>
                        <div id="section-list" class="col-md-12"></div>

                    </div>

                    <div class="form-group row action-group">
                        <div class="col-12 text-right">
                            @component('theme::components.button')
                            @slot('id', 'submit-banner')
                            @slot('control', 'submit')
                            @if(isset($banner))
                                @slot('label', trans('theme::theme.action.update'))
                            @else
                                @slot('label', trans('theme::theme.action.create'))
                            @endif
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'back-banner')
                            @slot('label', trans('theme::theme.back'))
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
@endsection

@section('scripts')
    <script id="banner-multiple-section" type="text/x-handlebars-template">
        @{{#.}}
        <div class="row banner-section">
            <div class="form-group col-md-4">
                @component('theme::components.field')
                @slot('id', 'image@{{@index}}')
                @slot('title', trans('theme::theme.title'))
                @slot('name', 'image[@{{@index}}].title')
                @slot('value', '@{{ title }}')
                @slot('attributes', ['onchange' => 'bannerMultipleImage.list[@{{ @index }}].title=this.value'])
                @endcomponent
            </div>
            <div class="form-group col-md-4">
                @component('theme::components.field')
                @slot('id', 'image-desc@{{@index}}')
                @slot('title', trans('theme::theme.desc'))
                @slot('name', 'image[@{{@index}}].desc')
                @slot('value', '@{{ desc }}')
                @slot('attributes', ['onchange' => 'bannerMultipleImage.list[@{{ @index }}].desc=this.value'])
                @endcomponent
            </div>

            <div class="form-group col-md-4">
                @component('theme::components.field')
                @slot('id', 'image-link@{{@index}}')
                @slot('title', 'URL')
                @slot('name', 'image[@{{@index}}].link')
                @slot('value', '@{{ link }}')
                @slot('attributes', ['onchange' => 'bannerMultipleImage.list[@{{ @index }}].link=this.value'])
                @endcomponent
            </div>

            <div class="col-md-4">
                @component('theme::components.button')
                @slot('id', 'select-image@{{ @index }}')
                @slot('label', trans('theme::theme.image'))
                @slot('attributes',  ['onclick' => 'bannerMultipleImage.selectingSection=@{{ @index }};windowUtil.openPopupWindow(\''. route('media.upload').'?mode=add&referral=bannerMultipleImage\')'])
                @endcomponent
            </div>
            @{{#if img.link}}
            <div class="col-md-4">
                <img src="@{{ img.link }}" class="img-thumbnail" alt="Image for this section">
            </div>
            @{{/if}}

            <i class="fi fi-cross" data-index="@{{@index}}" data-control="remove"></i>
        </div>
        @{{/.}}
    </script>
    <script>
        let updateMode = {!! isset($banner) ? 'true': 'false' !!};
        let api = {
            banner: {
                    create: '{{ route('frontend.banner.create') }}',
                    @if(isset($banner))
                    update: '{{ route('frontend.banner.update', $banner->getKey()) }}',
                    @endif
            }
        }
        @if(isset($banner))

        $(document).ready(function(){
            bannerMultipleImage.list = {!!  json_encode($banner->images()->map( function($img) {
                return ['title' => $img->title, 'desc'  => $img->desc, 'link'   => $img->link, 'img' => [ 'id' => $img->media_id, 'link' => asset('storage/'. $img->media->path_org) ]];
            })) !!};

            bannerMultipleImage.parseTemplate();
            @if(!empty($banner->image()->first()))
            bannerImage.images = [ {!! json_encode(
                [
                    'id'    => $banner->image()->first()->getKey(),
                    'link'   => asset('storage/'. $banner->image()->first()->path_org)
                ]
            ) !!}];
            @endif
            bannerImage.parseTemplate();
        });
        @endif
    </script>
    <script src="{{ asset('packages/frontend/assets/js/banner/banner.crud.js')}}"></script>
@endsection