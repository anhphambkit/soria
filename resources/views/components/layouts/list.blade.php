<div class="form-group row">
    <div class="col-12">
        @if(isset($btnNew))
            {!! $btnNew !!}
        @else
            @component('theme::components.button')
            @slot('label', 'New '. $model)
            @slot('id', 'new-'.$model.'-btn')
            @if(isset($newLink))
                @slot('attributes', ['onclick' => 'window.location.href=\''. $newLink. '\''])
            @endif
            @endcomponent
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-12">
    @component('theme::components.table')
    @slot('id', 'tbl-'. $model)
    @slot('columns', $cols)
    @slot('rows', $rows)
    @endcomponent
    </div>
</div>
