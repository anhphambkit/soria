<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/1/18
 * Time: 14:47
 */
?>
<?php
/** Check parameters */
$class = isset($class) ? $class : '';
$id = isset($id) ? $id : '';
$header = isset($header) ? $header : 'Breadcrumbs top';
?>
<div class="row breadcrumbs-top {{ $class }}" id="{{ $id }}">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            @foreach($items as $item)
                <li class="breadcrumb-item {{ $item['active'] ? 'active' : '' }}">
                    @if(isset($item['active']) && $item['active'] == false)
                        <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                    @else
                        {{ $item['title'] }}
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</div>
<h3 class="content-header-title mb-0">{{ $header }}</h3>
