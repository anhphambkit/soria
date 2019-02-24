<?php
$parseErrorLaravel = isset($parseErrorLaravel) ? $parseErrorLaravel : false;
$jsValidate = isset($jsValidate) ? $jsValidate : true;
$type = isset($type) ? $type : 'text';
$class = isset($class) ? $class : '';
$pattern = isset($pattern) ? $pattern : '';
$attributes = isset($attributes) ? $attributes : [];
$isCkEditor = isset($isCkEditor) ? $isCkEditor : true;
$isTinyEditor = isset($isTinyEditor) ? $isTinyEditor : false;
$content = isset($content) ? $content : '';
$classWrap = isset($classWrap) ? $classWrap : 'wrapper-element';
$disabled = isset($disabled) ? $disabled : false;
//if ($jsValidate) $class .= ' form-custom-validate-js';
?>
@if($type === 'text' || $type === 'number' || $type === 'email' || $type === 'password')
<div class="field-group float-label active {{ $class }}">
    <label for="{{ $id }}" class="label-default-custom">
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
                pattern="{{ $pattern }}"

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title. (isset($required) && $required ? ' (*)': '') }}"
                @endif

                @if(isset($value))
                value="{{ $value }}"
                @endif

                @foreach($attributes as $key => $val)
                    {{ $key. '='. $val }}
                @endforeach
        />
    </div>
</div>

@elseif(isset($type) && $type === 'checkbox')
<div class="checkbox checkbox-custom checkbox-circle {{ $class }}">
    <input id="{{ $id }}" name="{{ $name }}" data-size="small" data-color="#27B5C4"  type="checkbox" {{ $checked ? 'checked' : '' }}
    @foreach($attributes as $key => $val)
        {{ $key. '='. $val }}
    @endforeach
    >
    <label for="{{ $id }}" class="label-checkbox label-default-custom">
        {{ $title }}
    </label>
</div>

@elseif(isset($type) && $type === 'dropdown')
    <div class="field-group float-label selectpicker {{ $class }}">
        <label for="{{ $id }}" class="label-default-custom">
            {{ $title }}
            @if(isset($required) && $required)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="field">
            <select
                id="{{ $id }}"
                class="select2-control float-control bb-select"
                @if(isset($name))
                name="{{ $name }}"
                @endif

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title }}"
                @endif

                @foreach($attributes as $key => $val)
                    {{ $key. '='. $val }}
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
        <label for="{{ $id }}" class="label-default-custom">
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
                    {{ $key. '='. $val }}
                @endforeach
            />
            <div class="input-group-append">
                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
            </div>
        </div>
    </div>
@elseif(isset($type) && ($type === 'time'))
    <div class="field-group float-label {{ $class }}">
        <label for="{{ $id }}" class="label-default-custom">
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
                    {{ $key. '='. $val }}
                @endforeach
            />
            <div class="input-group-append">
                <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
            </div>
        </div>
    </div>
@elseif(isset($type) && $type === 'editor')
    <div class="{{ $classWrap }}" id="editor-{{ $id }}">
        <label for="{{ $id }}" class="label-default-custom">
            {{ $title }}
            @if(isset($tooltip))
                <i class="{{$tooltipClass}}" data-toggle="tooltip" title="{{$tooltipTitle}}"></i>
            @endif
        </label>
        <textarea
                @if($disabled)
                disabled
                @endif

                @if(!empty($name))
                name="{{ $name }}"
                @endif

                @if(!empty($required))
                required
                @endif

                @if(empty($class))
                class="form-control noIcon"
                @else
                class="form-control"
                @endif

                id="{{ $id }}"

                @if(isset($placeholder))
                placeholder="{{ $placeholder }}"
                org-placeholder="{{ $placeholder }}"
                @else
                placeholder="{{ $title. (isset($required) && $required ? ' (*)': '') }}"
                org-placeholder="{{ $title. (isset($required) && $required ? ' (*)': '') }}"
                @endif

                @if(isset($rows))
                rows="{{ $rows }}"
                @endif

                @if(isset($cols))
                cols="{{ $cols }}"
                @endif

                @if(isset($maxlength))
                maxlength="{{ $maxlength }}"
                @endif

        @foreach($attributes as $key => $val)
            {{ $key. '='. $val }}
                @endforeach
        >@if(isset($value)){{ $value }}@endif</textarea>
    </div>
@elseif($type === 'radio')
    <div class="{{ $classWrap }}">
        <div class="{{$class}}">
            @foreach($radioFields as $radioField)
                <div class="radio-field {{$classElement}}">
                    <input id="{{isset($radioField['id']) ? $radioField['id'] : ''}}" value="{{isset($radioField['value']) ? $radioField['value'] : ''}}"
                           name="{{$name}}"
                           class="{{isset($radioField['class']) ? $radioField['class'] : ''}}"
                           type="{{$type}}"
                           @if(isset($checked) && $checked == $radioField['value'])
                           checked="checked"
                            @endif

                    />
                    <label for="{{isset($radioField['id']) ? $radioField['id'] : ''}}" class="label-default-custom">{{isset($radioField['name']) ? $radioField['name'] : ''}}</label>
                </div>
            @endforeach
        </div>
    </div>

@elseif($type === 'radio-single')
    <div class="radio-btn-custom {{ $class }}">
        <input id="{{ $id }}" class="radio-custom" name="{{ $name }}" data-size="small" data-color="#27B5C4"  type="radio" {{ $checked ? 'checked' : '' }}
        @foreach($attributes as $key => $val)
            {{ $key. '='. $val }}
                @endforeach
        >
        <label for="{{ $id }}" class="label-checkbox label-default-custom label-custom-radio">
            {{ $title }}
        </label>
    </div>
@endif


@if($jsValidate)
    <ul class="validate-error" data-validation="data-validation" data-field="{{ isset($validateName) ? $validateName : $name }}"></ul>
@endif

@if($parseErrorLaravel)
    @if ($errors->has($name))
        <ul class="{{$classError}}" data-validation="data-validation" data-field="{{ isset($validateName) ? $validateName : $name }}">
            <li><strong>{{ $errors->first($name) }}</strong></li>
        </ul>
    @endif
@endif