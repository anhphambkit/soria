@extends('theme::layouts.admin')
@section('styles')
    <link href="{{ asset('packages/theme/vendors/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/theme/vendors/css/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('packages/product/assets/css/product.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @component('theme::components.cardbox')
                @slot('title', trans('product::product.package'). 's')
                @slot('isActive', true)
                @slot('notForm', true)
                @slot('content')
                <p class="text-muted font-14 m-b-20">...</p>
                <form role="form" id="product-form">
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', 'SKU')
                            @slot('name', 'sku')
                            @slot('id', 'product-sku')
                            @slot('class', 'active')
                            @slot('required', true)
                            @if(isset($product))
                                @slot('value', $product->sku)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('product::product.product-name'))
                            @slot('name', 'name')
                            @slot('class', 'active')
                            @slot('id', 'product-name')
                            @slot('required', true)
                            @if(isset($product))
                                @slot('value', $product->name)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('product::product.category') )
                            @slot('name', 'categories[]')
                            @slot('class', 'active')
                            @slot('type', 'dropdown')
                            @slot('id', 'product-categories')
                            @slot('attributes', ['multiple' => 'multiple'])
                            <?php
                            $catDropdown = [];
                            foreach ($cats as $cat) {
                                $catDropdown[$cat->getKey()] = $cat->name;
                            }
                            $categories = [];
                            if(isset($product)){
                                $categories = $product->categories()->map( function($cat) {
                                    return $cat->getKey();
                                })->toArray();
                            }
                            ?>
                            @slot('values', $catDropdown)
                            @slot('value', $categories)
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.status') )
                            @slot('name', 'status')
                            @slot('class', 'active')
                            @slot('type', 'dropdown')
                            @slot('id', 'product-status')
                            <?php
                            $catDropdown = [ 'P'    => trans('product::product.publish'), 'D'   => trans('product::product.draft')];
                            ?>
                            @slot('values', $catDropdown)
                            @if(isset($product))
                                @slot('value', $product->status)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.price'))
                            @slot('name', 'price')
                            @slot('class', 'active')
                            @slot('id', 'product-price')
                            @slot('required', true)
                            @slot('type', 'number')
                            @if(isset($product))
                                @slot('value', $product->price)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.slug'))
                            @slot('name', 'slug')
                            @slot('id', 'product-slug')
                            @slot('class', 'active')
                            @slot('required', true)
                            @if(isset($product))
                                @slot('value', $product->slug)
                            @else
                                @slot('value', '')
                            @endif
                            @endcomponent
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('product::product.discount') )
                            @slot('name', 'sale_value')
                            @slot('class', 'active')
                            @slot('id', 'product-discount')
                            @slot('type', 'number')
                            @if(isset($product))
                                @slot('value', $product->sale_value)
                            @else
                                @slot('value', 0)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('product::product.discount-type') )
                            @slot('name', 'sale_type')
                            @slot('type', 'dropdown')
                            @slot('class', 'active')
                            @slot('id', 'product-discount-type')
                            <?php
                            $dropdown = [ '0' => 'None', 'A'    => trans('theme::theme.amount'), 'P'   => trans('theme::theme.percent'). ' (%)'];
                            ?>
                            @slot('values', $dropdown)
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('product::product.keywords') )
                            @slot('name', 'keywords')
                            @slot('id', 'product-keywords')
                            @if(isset($product))
                                @slot('value', $product->keywords)
                            @else
                                @slot('value', '')
                            @endif
                            @slot('class', 'active')
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.feature'))
                            @slot('name', 'is_feature')
                            @slot('type', 'checkbox')
                            @slot('id', 'product-feature')
                            @if(isset($product))
                                @slot('checked', $product->is_feature)
                            @else
                                @slot('checked', false)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.best-seller'))
                            @slot('name', 'is_best_seller')
                            @slot('type', 'checkbox')
                            @slot('id', 'product-best-seller')
                            @if(isset($product))
                                @slot('checked', $product->is_best_seller)
                            @else
                                @slot('checked', false)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.free-ship'))
                            @slot('name', 'is_free_ship')
                            @slot('type', 'checkbox')
                            @slot('id', 'product-free-ship')
                            @if(isset($product))
                                @slot('checked', $product->is_free_ship)
                            @else
                                @slot('checked', false)
                            @endif
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.rating') )
                            @slot('name', 'rating')
                            @slot('type', 'dropdown')
                            @slot('class', 'active')
                            @slot('id', 'product-rating')
                            <?php
                                $dropdown = [ '1' => '1 star', '2'    => '2 stars', '3'   => '3 stars', '4' => '4 stars', '5'  => '5 stars'];
                            ?>
                            @slot('values', $dropdown)
                            @if(isset($product))
                                @slot('value', $product->rating)
                            @endif
                            @endcomponent
                        </div>
                        <div class="form-group col-md-4">
                            @component('theme::components.field')
                            @slot('title', trans('theme::theme.manufacturer') )
                            @slot('name', 'manufacturer_id')
                            @slot('type', 'dropdown')
                            @slot('class', 'active')
                            @slot('id', 'product-manufacturer')
                            <?php $dropdown = []; ?>
                            @foreach($manufacturers as $m)
                            <?php
                                $dropdown[$m->getKey()]= $m->name;
                            ?>
                            @endforeach
                            @slot('values', $dropdown)
                            @if(isset($product))
                                @slot('value', $product->manufacturer_id)
                            @endif
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            @component('theme::components.button')
                            @slot('id', 'thumbnail-btn')
                            @slot('type', 'button')
                            @slot('label', '<i class="fi fi-image"></i> '. trans('product::product.thumb-image'))
                            @slot('attributes', ['onclick' => 'productImage.isSingle=true;windowUtil.openPopupWindow(\''. route('media.upload').'?mode=add&referral=productImage\')'])
                            @endcomponent
                            <div class="row"><div class="col-12" id="thumbnail-panel"></div></div>
                        </div>
                        <div class="form-group col-md-8">
                            @component('theme::components.button')
                            @slot('id', 'related-images-btn')
                            @slot('type', 'button')
                            @slot('label', '<i class="fi fi-camera"></i> '. trans('product::product.related-images'))
                            @slot('attributes', ['onclick' => 'productImage.isSingle=false;windowUtil.openPopupWindow(\''. route('media.upload').'?mode=add&referral=productImage\')'])
                            @endcomponent

                            <div class="row"><div class="col-12" id="related-panel"><ul class="related-images"></ul></div></div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            @component('theme::components.field')
                            @slot('title', trans('product::product.short-desc') )
                            @slot('name', 'short-desc')
                            @slot('id', 'product-short-desc')
                            @slot('type', 'editor')
                            @if(isset($product))
                                @slot('value', $product->desc)
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
                            @slot('title', trans('product::product.content') )
                            @slot('name', 'content')
                            @slot('id', 'product-content')
                            @slot('type', 'editor')
                            @if(isset($product))
                                @slot('value', $product->long_desc)
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
                            @slot('id', 'submit-product')
                            @slot('control', 'submit')
                            @if(isset($product))
                                @slot('label', trans('theme::theme.action.update'))
                            @else
                                @slot('label', trans('theme::theme.action.create'))
                            @endif
                            @endcomponent

                            @component('theme::components.button')
                            @slot('id', 'back-product')
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
    <script src="{{ asset('packages/theme/vendors/js/tinymce/tinymce.min.js')}}"></script>
@endsection

@section('scripts')
    <script id="thumb-img-template" type="text/x-handlebars-template">
        <div class="product-image-panel">
            <img src="@{{ link }}" class="product-image-control feature-image" />
            <i class="fi fi-cross" data-product-image-id="@{{ id }}" data-product-image-type="thumb" data-product-image-control="remove"></i>
        </div>

    </script>
    <script id="related-img-template" type="text/x-handlebars-template">
        <ul class="related-images">
            @{{#.}}
            <li class="product-image-panel">
                <img src="@{{ link }}" class="product-image-control related-image">
                <i class="fi fi-cross" data-product-image-type="related" data-product-image-index="@{{@index}}" data-product-image-control="remove" data-product-image-id="@{{ id }}"></i>
            </li>
            @{{/.}}
        </ul>
    </script>
    <script>
        let updateMode = {!! isset($product) ? 'true': 'false' !!};

        @if(isset($product))
        let product = {
            @if(empty($product->img_id))
            thumbImg: null,
            @else
            thumbImg: {
                id: {{ $product->img_id }},
                link: '{{ asset('storage/'.$product->thumbImg()->path_org) }}'
            },
            @endif

            @if(empty($product->relatedImg()))
            relatedImg: [],
            @else
            relatedImg: [
                @foreach($product->relatedImg() as $img)
                {
                    id: {{ $img->getKey() }},
                    link: '{{ asset('storage/'.$img->path_org) }}',
                },
                @endforeach
            ]
            @endif
        };
        @endif
        let api = {
            product: {
                create: '{{ route('product.create') }}',
                @if(isset($product))
                update: '{{ route('product.update', $product->getKey()) }}',
                @endif
            }
        }
    </script>
    <script src="{{ asset('packages/product/assets/js/product.crud.js')}}"></script>
@endsection