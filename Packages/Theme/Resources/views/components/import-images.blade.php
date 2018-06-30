@component('theme::components.button')
@slot('id', $id)
@slot('type', 'button')
@slot('label', '<i class="fi fi-image"></i> '. trans('theme::theme.image'))
@slot('attributes', ['onclick' => 'windowUtil.openPopupWindow(\''. route('media.upload').'?mode=add&referral='. $objMedia. '\')'])
@endcomponent
<div class="row">
    <div class="col-12" id="{{$id}}-source-image-panel"></div>
</div>
<?php $single = isset($single) ? 'true': 'false';?>
<script id="{{$id}}-img-template" type="text/x-handlebars-template">
    <ul class="component-images">
        @{{#.}}
        <li class="{{ $id }}-image-panel">
            <img src="@{{ link }}" class="img-thumbnail">
            <i class="fi fi-cross" data-image-single="{{ $single }}" data-image-index="@{{@index}}" data-image-control="remove" data-image-id="@{{ id }}"></i>
        </li>
        @{{/.}}
    </ul>
</script>