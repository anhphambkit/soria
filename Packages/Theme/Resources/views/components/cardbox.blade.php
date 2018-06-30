<div class="card-box ribbon-box eden-card"
     @if(isset($isActive) && $isActive == true)
     data-active="true"
    @elseif (isset($isActive) && $isActive == false)
     data-active="false"
     @endif
>
    <div class="ribbon ribbon-custom">{{ mb_convert_case($title, MB_CASE_UPPER, 'UTF-8') }}</div>
    @if(empty($notForm))
        <div class="control-panel">
            <i class="dripicons-document-edit switch-panel-mode"></i>
        </div>
    @endif
    <div class="mt-5">
        {{ $content }}
    </div>
</div>