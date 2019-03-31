<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2019-03-11
 * Time: 10:48
 */
$calloutType = !empty($calloutType) ? $calloutType : "warning";
$calloutClass = !empty($calloutClass) ? $calloutClass : "callout-border-left";
$contentCallout = !empty($contentCallout) ? $contentCallout : "";
?>
<div class="apt-callout bs-callout-{{ $calloutType }}  {{ $calloutClass }}">
    {{ $contentCallout }}
</div>
