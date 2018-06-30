<?php
    $type = empty($type) ? 'button' : $type;
    $control = empty($control) ? 'button' : $control; // If control = submit, it will be submit button

    if($control === 'submit'){
        $class = isset($class) ? 'btn-custom '. $class : 'btn-custom';
    } elseif($control === 'cancel'){
        $class = isset($class) ? 'btn-outline-secondary '. $class : 'btn-outline-secondary';
    } else {
        $class = isset($class) ? 'btn-outline-custom '. $class : 'btn-outline-custom';
    }

    $attributes = isset($attributes) ? $attributes : [];
?>


<button data-loading="<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> {{trans('theme::theme.action.processing')}}" type="{{ $type }}" data-control="{{ $control }}" id="{{ $id }}" class="btn has-spinner waves-effect waves-light {{ $class }}"
    @foreach($attributes as $key => $val)
        {!! $key. '="'. $val. '" ' !!}
    @endforeach
>
    <span class="button-label">
    @if($control ==='cancel')
        {{trans('theme::theme.action.cancel')}}
    @else
        <?php echo $label; ?>
    @endif
    </span>
</button>