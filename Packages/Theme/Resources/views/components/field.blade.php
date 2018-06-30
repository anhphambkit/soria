<?php
$type = isset($type) ? $type : 'text';
$class = isset($class) ? $class : '';
$attributes = isset($attributes) ? $attributes : [];
if(isset($name) && !isset($id)) {
    $id = str_replace('_', '-', $name);
}
?>
@if($type === 'text' || $type === 'number' || $type === 'email' || $type === 'password')
<div class="field-group float-label active {{ $class }}">
    <label for="{{ $id }}">
        {{ $title }}
        @if(isset($required) && $required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="field">
        <input
                type="{{ $type }}"
                @if(isset($name))
                name="{{ $name }}"
                @endif
                @if(!empty($required))
                required
                @endif
                class="form-control float-control {{$class}}" id="{{ $id }}"

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title. (isset($required) && $required ? ' (*)': '') }}"
                @endif

                @if(isset($value))
                value="{{ $value }}"
                @endif

                @foreach($attributes as $key => $val)
                    {{ $key. '='. $val. ' ' }}
                @endforeach
        />
    </div>
</div>

@elseif(isset($type) && $type === 'checkbox')
<div class="checkbox checkbox-custom checkbox-circle">
    <input id="{{ $id }}" name="{{ $name }}" data-size="small" data-color="#27B5C4"  type="checkbox" {{ $checked ? 'checked' : '' }} data-plugin="switchery"
    @foreach($attributes as $key => $val)
        {{ $key. '='. $val. ' ' }}
    @endforeach
    >
    <label for="{{ $id }}">
        {{ $title }}
    </label>
</div>

@elseif(isset($type) && $type === 'dropdown')
    <div class="field-group float-label selectpicker {{ $class }}">
        <label for="{{ $id }}">
            {{ $title }}
            @if(isset($required) && $required)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="field">
            <select
                id="{{ $id }}"
                class="select2-control float-control"

                @if(isset($name))
                name="{{ $name }}"
                @endif

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title }}"
                @endif

                @foreach($attributes as $key => $val)
                    {{ $key. '='. $val. ' ' }}
                @endforeach

            >
                @foreach($values as $key => $val)
                    <?php
                        $selectStr = '';
                        if(isset($value) && !is_array($value) && $value === $key){ // Single select
                            $selectStr = 'selected';
                        } elseif(isset($value) && is_array($value) && in_array($key, $value)) { // Multiple select
                            $selectStr = 'selected';
                        }
                    ?>
                    <option value="{{ $key }}" {{ $selectStr }} >{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>

@elseif(isset($type) && ($type === 'date' || $type === 'date-range'))
    <div class="field-group float-label {{ $class }}">
        <label for="{{ $id }}">
            {{ $title }}
            @if(isset($required) && $required)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="field input-group">
            <input
                type="text"
                @if(isset($name))
                name="{{ $name }}"
                @endif
                @if(!empty($required))
                required
                @endif
                class="form-control float-control {{ $type }}-picker" id="{{ $id }}"

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title }}"
                @endif

                @if(isset($value))
                value="{{ $value }}"
                @endif

                @foreach($attributes as $key => $val)
                    {{ $key. '='. $val. ' ' }}
                @endforeach
            />
            <div class="input-group-append">
                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
            </div>
        </div>
    </div>
@elseif(isset($type) && ($type === 'time'))
    <div class="field-group float-label {{ $class }}">
        <label for="{{ $id }}">
            {{ $title }}
            @if(isset($required) && $required)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="field input-group">
            <input
                type="text"
                @if(isset($name))
                name="{{ $name }}"
                @endif
                @if(!empty($required))
                required
                @endif
                class="form-control float-control {{ $type }}-picker" id="{{ $id }}"

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title }}"
                @endif

                @if(isset($value))
                value="{{ $value }}"
                @endif

                @foreach($attributes as $key => $val)
                    {{ $key. '='. $val. ' ' }}
                @endforeach
            />
            <div class="input-group-append">
                <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
            </div>
        </div>
    </div>
@elseif(isset($type) && $type === 'editor')
    <textarea class="eden-editor {{ $class }}" id="{{ $id }}">{{ $value }}</textarea>
@endif

@if(empty($noValidate))
    <ul class="" data-validation="eden-validation" data-field="{{ isset($validateName) ? $validateName : $name }}"></ul>
@endif