<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 1/19/19
 * Time: 21:08
 */
?>
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            @foreach($breadcrumbs as $nameBreadcrumb => $linkBreadcrumb)
                <li>
                    <a href="{{ $linkBreadcrumb }}">{{ $nameBreadcrumb }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
