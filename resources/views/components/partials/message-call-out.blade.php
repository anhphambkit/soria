<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 2019-03-11
 * Time: 10:48
 */
$calloutType = !empty($calloutType) ? $calloutType : "warning";
$calloutClass = !empty($calloutClass) ? $calloutClass : "callout-border-right";
$contentCallout = !empty($contentCallout) ? $contentCallout : "";
?>
<div class="bs-callout-{{ $calloutType }}  {{ $calloutClass }} callout-custom">
    {{ $contentCallout }}
</div>
